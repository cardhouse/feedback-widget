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
        switch ($this->platform) {
            case 'soundcloud':
                $response = Http::accept('application/json')
                    ->get("https://soundcloud.com/oembed?url={$this->url}&maxheight=370&show_comments=false");
                return $response->json('html');
                break;
            
            case 'youtube':
                $queryString = parse_url($this->url, PHP_URL_QUERY);
                preg_match('/v=([a-z0-9_\-]+)/i', $queryString, $matches);
                
                return '<iframe id="ytplayer" type="text/html" width="640" height="360"
                src="https://www.youtube.com/embed/'.$matches[1].'"
                frameborder="0"></iframe>';
                break;
            
            default:
                return '<a href="'.$this->url.'" target="_blank">'.$this->url.'</a>';
                break;
        }
        // Make API call or something to get embed html
        
    }
}
