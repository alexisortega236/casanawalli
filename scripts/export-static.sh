#!/usr/bin/env bash
set -euo pipefail

BASE_URL="${EXPORT_SOURCE_URL:-http://127.0.0.1:8000}"
BASE_PATH="${PAGES_BASE_PATH:-}"
OUT_DIR="${STATIC_EXPORT_DIR:-static-export}"
export BASE_PATH

rm -rf "$OUT_DIR"
mkdir -p "$OUT_DIR"

paths=(
  "/en"
  "/en/suites"
  "/en/suites/oasis-owners-suite"
  "/en/suites/infinite-coastlines"
  "/en/suites/tate-naaliwa"
  "/en/suites/celestial-vault"
  "/en/suites/dusk-and-dawn"
  "/en/suites/stars-and-jasmines"
  "/en/suites/whispering-ferns"
  "/en/availability"
  "/en/experiences"
  "/en/experiences/heated-salt-water-pool"
  "/en/experiences/edible-tropical-gardens"
  "/en/experiences/main-house-living-room"
  "/en/experiences/responsible-travel-practices"
  "/en/experiences/pickleball-and-wellness"
  "/en/experiences/sushi-and-bar"
  "/en/packages"
  "/en/plaza-nawalli"
  "/en/gallery"
  "/en/about"
  "/en/blog"
  "/en/blog/discover-the-charming-lifestyle-of-sayulita-nayarit"
  "/en/blog/once-again-in-sayulita"
  "/en/blog/what-to-do-in-sayulita"
  "/en/faq"
  "/en/contact"
  "/en/privacy-policy"
  "/es"
  "/es/suites"
  "/es/availability"
  "/es/experiences"
  "/es/packages"
  "/es/plaza-nawalli"
  "/es/gallery"
  "/es/about"
  "/es/blog"
  "/es/faq"
  "/es/contact"
  "/es/privacy-policy"
)

for path in "${paths[@]}"; do
  target="$OUT_DIR$path/index.html"
  mkdir -p "$(dirname "$target")"
  curl -fsSL "$BASE_URL$path" -o "$target"
done

cp -R public/build "$OUT_DIR/build"
cp public/favicon.ico "$OUT_DIR/favicon.ico"
cp "$OUT_DIR/en/index.html" "$OUT_DIR/index.html"

find "$OUT_DIR" -name "*.html" -type f -print0 | while IFS= read -r -d '' file; do
  perl -0pi -e '
    my $base = $ENV{BASE_PATH} // "";
    my $prefix = $base;
    $prefix =~ s#^/##;
    s#https?://(?:127\.0\.0\.1:8000|localhost)##g;
    if (length $base) {
      s#(href|src)="/(?!\Q$prefix\E/)#$1="$base/#g;
    }
  ' "$file"
done

touch "$OUT_DIR/.nojekyll"
