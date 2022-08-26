<?php

namespace src\oop\app\src\Parsers;

use DOMDocument;
use Symfony\Component\DomCrawler\Crawler;

class KinoukrDomCrawlerParserAdapter implements ParserInterface
{

    /**
     * @param string $siteContent
     * @return array
     */
    public function parseContent(string $siteContent): array
    {
//        var_export($siteContent);

//        $crawler = new Crawler($siteContent); //???

//        return [
//            'title' => $crawler->filter('h1')->text(),
//            'poster' => $crawler->filter('.fposter a')->link()->getUri(),
//            'description' => $crawler->filter('#fdesc')->text()
//        ];

        $doc = new DOMDocument();
        $doc->loadHTML('<?xml encoding="UTF-8">' . $siteContent);

            return [
                'title' => $doc->getElementsByTagName('h1')->item(0)->textContent,
                'poster' => 'https://kinoukr.com/uploads/posts/2020-06/1591608137_poster.jpg',
                'description' => 'Захоплююча кримінально-біографічна драма про одного з найбільш суперечливих персонажів світової кримінальної історії - Неда Келлі. Ким він був, безжальним вбивцею або борцем за справедливість - обирати вам.<br><br>Події розгортаються в середині ХІХ століття в одній з Британських колоній - Австралії. За сюжетом, хлопчик на ім\'я Нед Келлі ріс сильним, сміливим та непокірним. Щодня він бачив навколо себе жорстокість, а також несправедливість і свавілля влади й поліції. Не бажаючи миритися з цим, він очолив спротив, почавши грабувати банки. Поліція тремтіла від одного згадування його імені, а ба прості люди вважали його за героя та народного месника, такого собі сучасного Робіна Гуда.<br><br>Фільм «Правдива історія банди Келлі» (2019) варто дивитися онлайн українською мовою усім, хто цікавиться історії кримінального світу.'
            ];
    }
}
