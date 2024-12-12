<?php

namespace App\Http\Controllers;

use App\Models\School_path;
use App\Models\Sector;
use App\Models\Forum_edition;
use App\Models\Forum_edition_company;
use App\Models\Company;
use Illuminate\Http\Request;

class ForumEditionController extends Controller
{
    /**
     * Renvoie sur la page d'une édition d'un forum
     */
    public function getForumEditionByYear($year) {
        $forum_edition = Forum_edition::getForumByYear($year);
        $latest_forum = Forum_edition::getLatestForum();

        if ($forum_edition) {
            if ($forum_edition == $latest_forum ) {
                return redirect()->to('/exposants');
            } else {
                $companies = Company::getAllCompaniesByForumEdition($forum_edition->forum_id);
                $all_paths = School_path::getAllSchoolPaths() ;
                $all_sectors = Sector::getAllSectors();
            
                return view('forum_edition', [
                    'forum_edition' => $forum_edition,
                    'year' => $year,
                    'companies' => $companies,
                    'all_paths'=> $all_paths,
                    'all_sectors' => $all_sectors
                ]);
            }
        }
        return view('errors.404');
    }
}
