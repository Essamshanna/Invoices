<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeAccounts extends Model
{
    protected $fillable = [
        'id',
        'acc_id',
        'acc_parent_no',
        'acc_aname',
        'acc_ename',
        'acc_type_id',
        'acc_report_id',
        'acc_level',
        'acc_debit',
        'acc_nature_id',
        'acc_credit',
        'acc_balance',
    ];
        public function acc_typees(){
            return $this->belongsTo(AccTypees::class, 'acc_type_id');
    }
        public function acc_reports(){
            return $this->belongsTo(AccReports::class, 'acc_report_id');
    }
        public function nature_accounts(){
            return $this->belongsTo(NatureAccounts::class, 'acc_nature_id');
        }
}
