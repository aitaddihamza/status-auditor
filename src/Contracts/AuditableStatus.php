<?php

namespace Aitaddihamza\StatusAuditor\Contracts;

interface AuditableStatus
{
  public function getStatusColumn(): string;
}
