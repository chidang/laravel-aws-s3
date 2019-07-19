<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    /* Fillable */
    protected $fillable = [
        'title', 'path', 'size'
    ];
    /* @array $appends */
    public $appends = ['url', 'uploaded_time', 'size_in_kb'];
    
    public function getUrlAttribute()
    {
        $disk = Storage::disk('s3');
        $s3_client = $disk->getDriver()->getAdapter()->getClient();
        $command = $s3_client->getCommand(
            'GetObject',
            [
                'Bucket' => env('AWS_BUCKET'),
                'Key'    => $this->path,
                // 'ResponseContentDisposition' => 'attachment;'
            ]
        );

        $request = $s3_client->createPresignedRequest($command, '+5 minutes');

        return (string) $request->getUri();

        // return Storage::disk('s3')->url($this->path);
    }
    public function getUploadedTimeAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'auth_by');
    }
    public function getSizeInKbAttribute()
    {
        return round($this->size / 1024, 2);
    }
    public static function boot()
    {
        parent::boot();
        // static::creating(function ($image) {
        //     $image->auth_by = auth()->user()->id;
        // });
    }

}
