<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use App\Models\Post;

class CreatePost extends CreateRecord
{
    protected static string $resource = PostResource::class;

}
