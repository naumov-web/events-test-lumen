<?php

namespace App\Http\Controllers\DevTools;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

/**
 * Class DocsController
 * @package App\Http\Controllers\DevTools
 */
final class DocsController extends Controller
{

    /**
     * Documentation file path
     * @var string
     */
    public const DOC_FILE_PATH = 'docs/swagger.yaml';

    /**
     * Get file with docs content
     *
     * @return string
     */
    public function file()
    {
        return file_get_contents(
            base_path(self::DOC_FILE_PATH)
        );
    }

    /**
     * Render form with docs
     *
     * @return View
     */
    public function form(): View
    {
        return view('dev_tools.docs_form');
    }

}
