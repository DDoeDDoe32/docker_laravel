<?php

namespace App;

use File;
use Illuminate\Support\Str;


class Documentation
{
    public function get($file = 'documentation.md')
    {
    	$content = File::get($this->path($file));

    	return $this->replaceLinks($content);
    }

    protected function path($file, $dir = 'docs')
    {
    	$file = Str::endsWith($file, '.md', '.png') ? $file : $file . '.md';
    	$path = base_path($dir . DIRECTORY_SEPARATOR . $file);

    	if (! File::exists($path)) {
    		abort(404, '요청하신 파일이 없습니다.');
    	}

    	return $path;
    }

    protected function replaceLinks($content)
    {
    	return str_replace('/docs/{{version}}', '/docs', $content);
    }

    public function image($file)
    {
        return \Image::make($this->path($file, 'docs/images'));
    }
}
