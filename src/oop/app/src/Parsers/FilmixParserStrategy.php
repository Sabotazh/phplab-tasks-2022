<?php

namespace src\oop\app\src\Parsers;

class FilmixParserStrategy implements ParserInterface
{

    /**
     * @param string $siteContent
     * @return array
     */
    public function parseContent(string $siteContent): array
    {
        preg_match('~<h1.*?>(.*?)</h1>~ius', $siteContent, $title);
        preg_match('~<a\sclass="fancybox".+?href="(.+?)"~ius', $siteContent, $poster);
        preg_match('~<div\sclass="full-story">(.+?)</div>~iu', $siteContent, $description);

        return [
            'title' => $title[1],
            'poster' => $poster[1],
            'description' => $description[1]
        ];
    }
}
