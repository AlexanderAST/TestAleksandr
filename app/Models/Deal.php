<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'responsibleUserId', 'groupId', 'createdBy', 'updatedBy', 'created_at', 'updated_at', 'accountId',
        'pipelineId', 'statusId', 'closedAt', 'closestTaskAt', 'price', 'lossReasonId', 'lossReason', 'isDeleted',
        'tags', 'companyId'
    ];
}
