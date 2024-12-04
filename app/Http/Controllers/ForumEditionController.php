<?php

namespace App\Http\Controllers;

use App\Models\Forum_edition;
use App\Models\Forum_edition_company;
use Illuminate\Http\Request;

class ForumEditionController extends Controller
{
    /**
     * Renvoie sur la page d'une édition d'un forum
     */
    public function getForumEditionByYear($year) {
        $forum_edition = Forum_edition::getForumByYear($year);

        if ($forum_edition) {
            $companies = Forum_edition_company::getCompaniesForForumById($forum_edition->forum_id); 
        
            return view('forum_edition', [
                'forum_edition' => $forum_edition,
                'companies' => $companies
            ]);
        }
        return view('errors.404');
    }
}
