<?php


namespace Benwilkins\Yak\Models;

use Benwilkins\Yak\Contracts\Models\ConversationState as ConversationStateContract;
use Benwilkins\Yak\Facades\Yak;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ConversationState
 * @package Benwilkins\Yak\Models
 */
class ConversationState extends YakBaseModel implements ConversationStateContract
{
    use SoftDeletes;

    protected $fillable = [
        'conversation_id',
        'user_id',
        'read',
        'last_read_at'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(self::userClass());
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conversation(): BelongsTo
    {
        return $this->belongsTo(Yak::getConversationClass());
    }

    /**
     * @param $query
     * @param $userId
     * @return mixed
     */
    public function scopeOfUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * @param $query
     * @param $conversationId
     * @return mixed
     */
    public function scopeOfConversation($query, $conversationId)
    {
        return $query->where('conversation_id', $conversationId);
    }
}