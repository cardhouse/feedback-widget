<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Song extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function artist() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function embedCode() : string
    {
        // TODO: Parse out what kind of embed code we need
        // Make API call or something to get embed html
        $response = Http::accept('application/json')->get("https://soundcloud.com/oembed?url={$this->url}");
        // return html
        return $response->json('html');
        
    }
}
