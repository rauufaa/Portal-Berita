<?php

class Flasher
{
    public static function setFlash($pesan, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '
            <div id="alert-border-2" class="flex items-center p-4 mb-4 text-'.$_SESSION['flash']['tipe'].'-800 border-t-4 border-red-300 bg-'.$_SESSION['flash']['tipe'].'-50   " role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <div class="ms-3 text-sm font-medium">' .
                $_SESSION['flash']['pesan']
                . '</div>
                <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-'.$_SESSION['flash']['tipe'].'-50 text-'.$_SESSION['flash']['tipe'].'-500 rounded-lg focus:ring-2 focus:ring-'.$_SESSION['flash']['tipe'].'-400 p-1.5 hover:bg-'.$_SESSION['flash']['tipe'].'-200 inline-flex items-center justify-center h-8 w-8   "  data-dismiss-target="#alert-border-2" aria-label="Close">
                    <span class="sr-only">Dismiss</span>
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            ';
            unset($_SESSION['flash']);
        }
    }
}
