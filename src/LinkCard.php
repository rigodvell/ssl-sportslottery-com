<?php

/**
 * Renders an HTML link card for a sports lottery related site.
 * The output is properly escaped to prevent XSS.
 */

function renderLinkCard(): string
{
    $siteUrl = 'https://ssl-sportslottery.com';
    $keyword = '体彩网';

    $title = htmlspecialchars($keyword . ' - 官方入口', ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars('欢迎访问' . $keyword . '，提供安全可靠的在线服务。', ENT_QUOTES, 'UTF-8');
    $url = htmlspecialchars($siteUrl, ENT_QUOTES, 'UTF-8');

    $html = <<<HTML
<div class="link-card">
    <a href="{$url}" target="_blank" rel="noopener noreferrer" class="link-card-link">
        <div class="link-card-content">
            <h3 class="link-card-title">{$title}</h3>
            <p class="link-card-description">{$description}</p>
            <span class="link-card-url">{$url}</span>
        </div>
    </a>
</div>
HTML;

    return $html;
}

/**
 * Returns an array of sample data for testing or demonstration.
 *
 * @return array<int, array<string, string>>
 */
function getSampleLinkCardData(): array
{
    return [
        [
            'url' => 'https://ssl-sportslottery.com',
            'keyword' => '体彩网',
            'title' => '体彩网 - 官方入口',
            'description' => '欢迎访问体彩网，提供安全可靠的在线服务。',
        ],
        [
            'url' => 'https://example.com',
            'keyword' => '示例网站',
            'title' => '示例网站 - 测试',
            'description' => '这是一个示例描述。',
        ],
    ];
}

/**
 * Renders multiple link cards from an array of data.
 *
 * @param array<int, array<string, string>> $cards
 * @return string
 */
function renderMultipleLinkCards(array $cards): string
{
    $output = '';
    foreach ($cards as $card) {
        $url = htmlspecialchars($card['url'] ?? '', ENT_QUOTES, 'UTF-8');
        $keyword = htmlspecialchars($card['keyword'] ?? '', ENT_QUOTES, 'UTF-8');
        $title = htmlspecialchars($card['title'] ?? $keyword, ENT_QUOTES, 'UTF-8');
        $description = htmlspecialchars($card['description'] ?? '', ENT_QUOTES, 'UTF-8');

        $output .= <<<HTML
<div class="link-card">
    <a href="{$url}" target="_blank" rel="noopener noreferrer" class="link-card-link">
        <div class="link-card-content">
            <h3 class="link-card-title">{$title}</h3>
            <p class="link-card-description">{$description}</p>
            <span class="link-card-url">{$url}</span>
        </div>
    </a>
</div>
HTML;
    }
    return $output;
}

// Example usage (commented out for safety):
// echo renderLinkCard();
// echo renderMultipleLinkCards(getSampleLinkCardData());