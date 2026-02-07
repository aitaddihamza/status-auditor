<?php

namespace Aitaddihamza\StatusAuditor\Traits;

use Aitaddihamza\StatusAuditor\Contracts\AuditableStatus;
use Aitaddihamza\StatusAuditor\Models\StatusAudit;

trait HasStatusAudit
{
  public static function bootHasStatusAudit()
  {
    static::updating(function ($model) {

      $column = $model->getStatusColumn();

      if ($model->isDirty($column)) {
        AuditableStatus::create([
          'model_type' => get_class($model),
          'model_id' => $model->id,
          'old_status' => $model->getOriginal($column),
          'new_status' => $model->$column,
          'user_id' => auth()->id()
        ]);
      }
    });
  }

  public function statusAudits()
  {
    return $this->morphMany(StatusAudit::class, 'auditable', 'model_type', 'model_id');
  }
}
