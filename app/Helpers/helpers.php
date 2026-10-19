<?php

if (! function_exists('asset_versioned')) {
    /**
     * Generate an asset path with automatic cache-busting based on file modification time.
     *
     * @param string $path
     * @return string
     */
    function asset_versioned(string $path): string
    {
        $cleanPath = ltrim($path, '/');
        $fullPath = public_path($cleanPath);

        if (file_exists($fullPath)) {
            return asset($cleanPath) . '?v=' . filemtime($fullPath);
        }

        return asset($cleanPath);
    }
}

if (! function_exists('versioned_asset')) {
    /**
     * Alias for asset_versioned.
     *
     * @param string $path
     * @return string
     */
    function versioned_asset(string $path): string
    {
        return asset_versioned($path);
    }
}
