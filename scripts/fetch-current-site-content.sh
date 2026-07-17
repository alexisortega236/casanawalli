#!/usr/bin/env bash
set -euo pipefail

BASE_URL="${CURRENT_SITE_URL:-https://nawallisayulita.com}"
OUT_DIR="${CURRENT_SITE_OUT_DIR:-database/content/current-site}"

mkdir -p "$OUT_DIR"

curl -fsSL "$BASE_URL/wp-json/" -o "$OUT_DIR/wp-json-index.json"
curl -fsSL "$BASE_URL/wp-json/wp/v2/pages?per_page=100&_embed=1" -o "$OUT_DIR/pages.json"
curl -fsSL "$BASE_URL/wp-json/wp/v2/posts?per_page=100&_embed=1" -o "$OUT_DIR/posts.json"
curl -fsSL "$BASE_URL/" -o "$OUT_DIR/home.html"

php -r '
$out = $argv[1];
$pages = json_decode(file_get_contents($out."/pages.json"), true) ?: [];
$posts = json_decode(file_get_contents($out."/posts.json"), true) ?: [];
$summary = [
    "source" => getenv("BASE_URL") ?: "https://nawallisayulita.com",
    "generated_at" => gmdate("c"),
    "pages" => array_map(fn ($page) => [
        "id" => $page["id"],
        "slug" => $page["slug"],
        "title" => html_entity_decode(strip_tags($page["title"]["rendered"] ?? ""), ENT_QUOTES | ENT_HTML5),
        "link" => $page["link"] ?? null,
        "modified" => $page["modified"] ?? null,
    ], $pages),
    "posts" => array_map(fn ($post) => [
        "id" => $post["id"],
        "slug" => $post["slug"],
        "title" => html_entity_decode(strip_tags($post["title"]["rendered"] ?? ""), ENT_QUOTES | ENT_HTML5),
        "link" => $post["link"] ?? null,
        "modified" => $post["modified"] ?? null,
    ], $posts),
];
file_put_contents($out."/manifest.json", json_encode($summary, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
' "$OUT_DIR"

echo "Fetched current site content into $OUT_DIR"
