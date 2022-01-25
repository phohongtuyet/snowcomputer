<?php

namespace App\Mail;

use App\Models\LienHe;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KhuyenMaiEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $lienhe;

    public function __construct(Lienhe $lh)
    {
        $this->lienhe = $lh;
    }
    
    public function build()
    {
        return $this->view('admin.emails.khuyenmai')
        ->subject('Hỗ trợ khách hàng ' . config('app.name', 'Laravel'));
    }
}
