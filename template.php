<?php
include "function.php";

/**
 * Responsável pela substituição das tags e retornar a página HTML
 *
 * @param string $page
 * @param array $tags
 * @return string
 */
function render ($page, $tags=[]) {
    $template = file_get_contents(__dir__ . "/{$page}");
    foreach ($tags as $key => $value) {
        $tagToReplace = '{{' . $key . '}}';
        $template = str_replace($tagToReplace, $value, $template);
    }
    return $template;
}

