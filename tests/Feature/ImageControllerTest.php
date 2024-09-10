<?php

namespace Tests\Feature;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ImageControllerTest extends TestCase
{
    use DatabaseTransactions;
    use WithFaker;

    public function test_it_stores_image(): void
    {
        Storage::fake();
        $imageName = 'photo1.jpg';

        $user = User::factory()->create();

        $this->actingAs($user)
            ->postJson(route('images.store'), [
                'image' => UploadedFile::fake()->image($imageName),
            ])->assertOk();

        Storage::assertExists("images/$imageName");
        $this->assertDatabaseHas(Image::class, [
            'url' => "public/storage/images/$imageName"
        ]);
    }

    public function test_it_will_reject_an_empty_image(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->postJson(route('images.store'), [
                'image' => 'oogabooga',
            ])->assertUnprocessable();
    }
}
