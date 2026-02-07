<?php

namespace Aitaddihamza\StatusAuditor\Models;

use Illuminate\Database\Eloquent\Model;

class StatusAudit extends Model
{

  protected $table = "status_audits";

  protected $fillable = [
    'model_type',
    'model_id',
    'old_status',
    'new_status',
    'user_id'
  ];

  public function auditable()
  {
    return $this->morphTo(null, 'model_type', 'model_id');
  }
}
