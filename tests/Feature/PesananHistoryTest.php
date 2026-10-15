<?php

namespace Tests\Feature;

use App\Models\Pesanan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PesananHistoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_empty_history_message_is_shown_when_there_are_no_orders(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertSeeText('Belum ada pesanan. Pesanan yang masuk akan ditampilkan di sini.');
    }

    public function test_submitted_order_is_saved_and_shown_in_history(): void
    {
        $response = $this->post('/pesan', [
            'nama' => 'Pelanggan Baru',
            'pesanan' => '2x Magelangan',
            'keterangan' => 'Tidak pedas',
        ]);

        $response->assertRedirect('/')
            ->assertSessionHas('sukses', 'Pesanan berhasil dikirim!');
        $this->assertDatabaseHas('pesanans', [
            'nama' => 'Pelanggan Baru',
            'pesanan' => '2x Magelangan',
            'keterangan' => 'Tidak pedas',
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSeeTextInOrder(['Pelanggan Baru', '2x Magelangan', 'Tidak pedas']);
    }

    public function test_latest_ten_orders_are_shown_newest_first_with_escaped_customer_names(): void
    {
        foreach (range(1, 11) as $orderNumber) {
            $order = Pesanan::create([
                'nama' => match ($orderNumber) {
                    1 => 'Pelanggan paling lama',
                    11 => '<script>alert(1)</script>',
                    default => "Pelanggan {$orderNumber}",
                },
                'pesanan' => "Pesanan {$orderNumber}",
                'keterangan' => null,
            ]);

            $order->forceFill(['created_at' => now()->addMinutes($orderNumber)])->saveQuietly();
        }

        $response = $this->get(route('home'));

        $response->assertOk()
            ->assertSeeTextInOrder([
                '<script>alert(1)</script>',
                'Pesanan 11',
                'Pelanggan 10',
                'Pesanan 10',
                'Pelanggan 9',
                'Pesanan 9',
            ])
            ->assertDontSeeText('Pelanggan paling lama');
    }
}
