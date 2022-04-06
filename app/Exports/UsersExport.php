<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;

class UsersExport implements FromView
{
    use Exportable;

    public function Role(string $role)
    {
        $this->role = $role;
        
        return $this;
    }

    public function view(): View
    {
        if($this->role == 'user')
        {
            return view('admin.exports.khachhang', [
                'invoices' => User::query()->select( 'users.*',
                DB::raw('(select donhang.dienthoaigiaohang from donhang where user_id = users.id  limit 1) as dienthoaigiaohang'))
                ->where('role', $this->role)
                ->get()        
            ]); 
        }
        else
        {
            return view('admin.exports.user', [
                'invoices' => User::query()->where('role', $this->role)->get()        
            ]);
        }
        
    }
}
