<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum_edition extends Model
{
    protected $primaryKey = 'forum_id';

    protected $fillable = [
        'date',
        'picture',
        'starting_hour',
        'ending_hour',
    ];

    /**
     * Récupère toutes les éditions des forums
     */
    public static function getAllForums() {
        $forums = Forum_edition::all();
        return $forums;
    }

    /**
     * Récupère une édition de forum selon son id
     */
    public static function getForumById($id) {
        $forum = Forum_edition::find($id); 
        if (!$forum) {
            return null;
        }
        return $forum;
    }

    /**
     * Récupère une édition de forum selon sa date
     */
    public static function getForumByYear($year) {
        return self::whereYear('date', $year)->first();
    }

    /**
     * Crée une nouvelle édition de forum
     */
    public static function createForum($date, $picture, $starting_hour, $ending_hour) {
        $forum = new Forum_edition();

        $forum->date = $date;
        $forum->picture = $picture;
        $forum->starting_hour = $starting_hour;
        $forum->ending_hour = $ending_hour;

        $success = $forum->save(); 
        return response()->json(['success' => $success, 'forum' => $forum]);
    }

    /**
     * Modifie une édition de forum désignée par son id
     */
    public static function updateForumById($id, $date, $picture, $starting_hour, $ending_hour) {
        $forum = self::find($id);

        if ($forum) {
            $forum->date = $date;
            $forum->picture = $picture;
            $forum->starting_hour = $starting_hour;
            $forum->ending_hour = $ending_hour;

            $success = $forum->save();
            return response()->json(['success' => $success, 'forum' => $forum]);
        }
    }

    /**
     * Supprime une édition de forum désignée par son id
     */
    public static function deleteForumById($id) {
        $forum = self::find($id);

        if ($forum) {
            $success = $forum->delete();
            return response()->json(['success' => $success, 'message' => 'Forum edition deleted successfully']);
        }
    }
}
