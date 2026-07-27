<?php
declare(strict_types=1);

/** Live /image/ base — default staging ({@see perf.php} env). */
const LIVE_BASE = 'https://www.bulkapparel.com/image/';
/** Cloudflare + live host origin (staging). */
const CF_SITE_ORIGIN = 'https://www.bulkapparel.com';
const S3_PRODUCTS_BASE = 'https://bulkapparel-images.s3.us-east-1.amazonaws.com/products/';

/** Keys and dimensions aligned with {@see perf.php} <code>sizes</code>. */
const SIZE_PRESETS = [
    'thumbnail-m' => ['path' => 'thumbnail-m', 'w' => 56],
    'thumbnail' => ['path' => 'thumbnail', 'w' => 80],
    'search' => ['path' => 'search', 'w' => 116],
    'popular-items' => ['path' => 'popular-items', 'w' => 200],
    'bulk-blank-shirts' => ['path' => 'bulk-blank-shirts', 'w' => 238],
    'fashion-wear-m' => ['path' => 'fashion-wear-m', 'w' => 328],
    'fashion-wear' => ['path' => 'fashion-wear', 'w' => 480],
    'fashion-wear-lg' => ['path' => 'fashion-wear-lg', 'w' => 600],
    'high-reso' => ['path' => 'high-reso', 'w' => 1200],
];

const DEFAULT_CF_FORMAT = 'auto';
const DEFAULT_CF_QUALITY = '90';
const DEFAULT_SIZE_KEY = 'bulk-blank-shirts';

/** @var list<string> */
$imagePaths = [
    'bulk-blank-shirts/10_fm.jpg',
    'bulk-blank-shirts/391a_fm.jpg',
    'bulk-blank-shirts/395_fm.jpg',
    'bulk-blank-shirts/372_fm.jpg',
    'bulk-blank-shirts/16_fm.jpg',
    'bulk-blank-shirts/28_fm.jpg',
    'sanmar-colors/bulk-blank-shirts/PC78H_athletichthr_model_front_072014.jpg',
    'bulk-blank-shirts/371_fm.jpg',
    'bulk-blank-shirts/1828_fm.jpg',
    'bulk-blank-shirts/369_fm.jpg',
    'bulk-blank-shirts/393_fm.jpg',
    'bulk-blank-shirts/2768_fm.jpg',
    'bulk-blank-shirts/29_fm.jpg',
    'bulk-blank-shirts/146_fm.jpg',
    'bulk-blank-shirts/32_fm.jpg',
    'bulk-blank-shirts/143_fm.jpg',
    'bulk-blank-shirts/135_fm.jpg',
    'bulk-blank-shirts/167_fm.jpg',
    'bulk-blank-shirts/94_fm.jpg',
    'bulk-blank-shirts/2217_fm.jpg',
    'bulk-blank-shirts/3895_fm.jpg',
    'bulk-blank-shirts/3897_fm.jpg',
    'bulk-blank-shirts/2115_fm.jpg',
    'bulk-blank-shirts/6891_fm.jpg',
    'sanmar-colors/bulk-blank-shirts/PC78H_athletichthr_model_front_072014.jpg',
    'sanmar-colors/bulk-blank-shirts/PC54_ash_model_front_102016.jpg',
    'sanmar-colors/bulk-blank-shirts/PC78_athletichthr_model_front_102016.jpg',
    'sanmar-colors/bulk-blank-shirts/PC380_deepnavy_model_front_072014.jpg',
    'bulk-blank-shirts/543_fm.jpg',
    'bulk-blank-shirts/526_fm.jpg',
    'bulk-blank-shirts/557_fm.jpg',
    'bulk-blank-shirts/571_fm.jpg',
    'bulk-blank-shirts/223_fm.jpg',
    'bulk-blank-shirts/222_fm.jpg',
    'bulk-blank-shirts/245_fm.jpg',
    'bulk-blank-shirts/7269_fm.jpg',
    'sanmar-colors/bulk-blank-shirts/J317_black_model_front.webp',
    'bulk-blank-shirts/5996_fm.jpg',
    'sanmar-colors/bulk-blank-shirts/JST56_black_model_front.webp',
    'bulk-blank-shirts/7378_fm.jpg',
    'bulk-blank-shirts/415_fm.jpg',
    'bulk-blank-shirts/428_fm.jpg',
    'sanmar-colors/bulk-blank-shirts/PC78ZH_athletichthr_model_front_102016.jpg',
    'bulk-blank-shirts/427_fm.jpg',
    'sanmar-colors/bulk-blank-shirts/ST350_black_model_front.webp',
    'sanmar-colors/bulk-blank-shirts/ST350LS_black_model_front_112019.webp',
    'sanmar-colors/bulk-blank-shirts/ST550_atomicblue_model_front_062018.webp',
    'sanmar-colors/bulk-blank-shirts/F244_black_model_front.webp',
    'alpha-colors/bulk-blank-shirts/shmhss_00_z.jpg',
    'alpha-colors/bulk-blank-shirts/shgd_51_z.jpg',
    'alpha-colors/bulk-blank-shirts/shmhls_45_z.jpg',
    'alpha-colors/bulk-blank-shirts/shvbj_51_z.jpg',
    'bulk-blank-shirts/369_fm.jpg',
    'bulk-blank-shirts/391a_fm.jpg',
    'bulk-blank-shirts/10_fm.jpg',
    'bulk-blank-shirts/33_fm.jpg',
    'bulk-blank-shirts/4332_fm.jpg',
    'bulk-blank-shirts/1411_fm.jpg',
    'bulk-blank-shirts/2523_fm.jpg',
    'bulk-blank-shirts/494_fm.jpg',
    'bulk-blank-shirts/3895_fm.jpg',
    'bulk-blank-shirts/2030_fm.jpg',
    'bulk-blank-shirts/2766_fm.jpg',
    'bulk-blank-shirts/6282_fm.jpg',
    'bulk-blank-shirts/45024_fm.jpg',
    'bulk-blank-shirts/1909_fm.jpg',
    'bulk-blank-shirts/3779_fm.jpg',
    'bulk-blank-shirts/1919_fm.jpg',
];

function encodeUrlPath(string $relativePath): string
{
    $parts = explode('/', str_replace('\\', '/', trim($relativePath, '/')));
    return implode('/', array_map('rawurlencode', $parts));
}

/**
 * Mirrors perf.php <code>getClosestBucket</code> for target size key <code>bulk-blank-shirts</code>.
 *
 * @return array{path: string, w: int}
 */
function closestBucketForTargetKey(string $targetKey): array
{
    $group1 = ['thumbnail-m', 'thumbnail', 'search', 'popular-items', 'bulk-blank-shirts'];
    $group2 = ['fashion-wear-m', 'fashion-wear'];

    if (in_array($targetKey, $group1, true)) {
        return ['path' => 'bulk-blank-shirts', 'w' => 238];
    }
    if (in_array($targetKey, $group2, true)) {
        return ['path' => 'fashion-wear', 'w' => 480];
    }

    return ['path' => 'high-reso', 'w' => 1200];
}

function cfImageSegment(int $w, string $f, string $q): string
{
    return 'w=' . $w . ',f=' . $f . ',q=' . $q;
}

function cloudflareProductsPrefix(string $segment): string
{
    return CF_SITE_ORIGIN . '/cdn-cgi/image/' . $segment . '/' . S3_PRODUCTS_BASE;
}

/**
 * URL set aligned with {@see perf.php} <code>buildUrls</code> for the selected target size and CF options.
 *
 * @return array{
 *   live: string,
 *   s3: string,
 *   current: string,
 *   strategy1: string,
 *   strategy2: string,
 *   basename: string
 * }
 */
function urlsForPath(
    string $relativePath,
    string $sizeKey = DEFAULT_SIZE_KEY,
    string $cfFormat = DEFAULT_CF_FORMAT,
    string $cfQuality = DEFAULT_CF_QUALITY
): array {
    $norm = trim(str_replace('\\', '/', $relativePath), '/');
    $filename = basename($norm);

    if (!isset(SIZE_PRESETS[$sizeKey])) {
        $sizeKey = DEFAULT_SIZE_KEY;
    }
    $size = SIZE_PRESETS[$sizeKey];
    $segment = cfImageSegment($size['w'], $cfFormat, $cfQuality);

    $isVendorColorPath = str_starts_with($norm, 'sanmar-colors/')
        || str_starts_with($norm, 'alpha-colors/');

    if ($isVendorColorPath) {
        $live = LIVE_BASE . encodeUrlPath($norm);
    } else {
        $live = LIVE_BASE . encodeUrlPath($size['path'] . '/' . $filename);
    }

    $s3Direct = S3_PRODUCTS_BASE . encodeUrlPath($norm);

    $cf = cloudflareProductsPrefix($segment);
    $closest = closestBucketForTargetKey($sizeKey);

    if ($isVendorColorPath) {
        $vendorCdn = $cf . encodeUrlPath($norm);
        $current = $vendorCdn;
        $strategy1 = $vendorCdn;
        $strategy2 = $vendorCdn;
    } else {
        $current = $cf . 'fashion-wear/' . rawurlencode($filename);
        $strategy1 = $cf . 'high-reso/' . rawurlencode($filename);
        $strategy2 = $cf . $closest['path'] . '/' . rawurlencode($filename);
    }

    return [
        'live' => $live,
        's3' => $s3Direct,
        'current' => $current,
        'strategy1' => $strategy1,
        'strategy2' => $strategy2,
        'basename' => $filename,
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image delivery comparison — Live vs strategy</title>
    <style>
        :root {
            --bg: #f0f2f5;
            --card: #fff;
            --border: #e2e5ea;
            --text: #1a1d21;
            --muted: #5c6370;
            --accent: #2563eb;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.45;
        }

        .page {
            --compare-cols: 4;
            width: 100%;
            max-width: min(1920px, 100%);
            margin: 0 auto;
            padding: 1.25rem 1rem 2.5rem;
        }

        header.page-head {
            margin-bottom: 1.25rem;
        }

        header.page-head h1 {
            font-size: 1.35rem;
            font-weight: 700;
            margin: 0 0 0.35rem;
        }

        header.page-head p {
            margin: 0;
            color: var(--muted);
            font-size: 0.95rem;
        }

        .comparison-grid {
            display: grid;
            grid-template-columns: repeat(var(--compare-cols, 4), minmax(0, 1fr));
            gap: 1rem;
        }

        .compare-card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .compare-card__path {
            font-size: 0.7rem;
            color: var(--muted);
            padding: 0.5rem 0.65rem;
            border-bottom: 1px solid var(--border);
            word-break: break-all;
            line-height: 1.35;
        }

        .compare-card__pair {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            min-height: 0;
        }

        .compare-card__pane {
            padding: 0.5rem;
            display: flex;
            flex-direction: column;
            align-items: stretch;
            gap: 0.35rem;
            border-right: 1px solid var(--border);
            min-width: 0;
        }

        .compare-card__pane:last-child {
            border-right: none;
        }

        .compare-card__pane span {
            font-size: 0.65rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            color: var(--muted);
            text-align: center;
        }

        .compare-card__pane span.live {
            color: #0d9488;
        }

        .compare-card__pane span.strategy-label {
            color: var(--accent);
        }

        .strategy-toolbar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.5rem 1rem;
            margin-bottom: 1rem;
            padding: 0.65rem 0.85rem;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 10px;
        }

        .strategy-toolbar label {
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text);
        }

        .strategy-toolbar select {
            font: inherit;
            padding: 0.35rem 0.5rem;
            border-radius: 6px;
            border: 1px solid var(--border);
            background: #fff;
        }

        .strategy-toolbar select#strategySelect {
            min-width: 12rem;
        }

        .strategy-toolbar select#cfFormatSelect {
            min-width: 7rem;
        }

        .strategy-toolbar select#cfQualitySelect {
            min-width: 5rem;
        }

        .strategy-toolbar select#sizeSelect {
            min-width: 14rem;
        }

        .strategy-toolbar select#columnSelect {
            min-width: 5.5rem;
        }

        .strategy-toolbar .control-cluster {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 0.5rem 1.25rem;
        }

        .strategy-toolbar .control-cluster > span {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
        }

        .compare-card__pane .img-wrap {
            width: 100%;
            max-width: 100%;
            aspect-ratio: 238 / 320;
            background: #eef1f4;
            border-radius: 6px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 1 1 auto;
            min-height: 0;
        }

        .compare-card__pane img {
            width: 100%;
            height: 100%;
            max-width: 100%;
            object-fit: contain;
            object-position: center;
            display: block;
        }
    </style>
</head>
<body>
    <div class="page" id="comparisonPage">
        <div class="strategy-toolbar">
            <div class="control-cluster">
                <span>
                    <label for="sizeSelect">Target size</label>
                    <select id="sizeSelect" name="size" title="Drives CF w= and Live /image/ folder (perf sizes)">
                        <?php foreach (SIZE_PRESETS as $key => $meta): ?>
                            <option value="<?= htmlspecialchars($key, ENT_QUOTES, 'UTF-8') ?>" <?= $key === DEFAULT_SIZE_KEY ? ' selected' : '' ?>>
                                <?= htmlspecialchars($key, ENT_QUOTES, 'UTF-8') ?> (<?= (int) $meta['w'] ?>px)
                            </option>
                        <?php endforeach; ?>
                    </select>
                </span>
                <span>
                    <label for="cfFormatSelect">Format</label>
                    <select id="cfFormatSelect" name="cfFormat" title="Cloudflare Image format (f)">
                        <option value="auto">auto</option>
                        <option value="webp" selected>webp</option>
                        <option value="avif">avif</option>
                        <option value="jpeg">jpeg</option>
                        <option value="png">png</option>
                    </select>
                </span>
                <span>
                    <label for="cfQualitySelect">Quality</label>
                    <select id="cfQualitySelect" name="cfQuality" title="Cloudflare Image quality (q)">
                        <?php foreach (['50', '65', '75', '80', '85', '90', '95', '100'] as $q): ?>
                            <option value="<?= htmlspecialchars($q, ENT_QUOTES, 'UTF-8') ?>" <?= $q === DEFAULT_CF_QUALITY ? ' selected' : '' ?>><?= htmlspecialchars($q, ENT_QUOTES, 'UTF-8') ?></option>
                        <?php endforeach; ?>
                    </select>
                </span>
                <span>
                    <label for="columnSelect">Columns</label>
                    <select id="columnSelect" name="columns" title="Cards per row in the grid">
                        <?php foreach (range(1, 8) as $c): ?>
                            <option value="<?= (string) (int) $c ?>"<?= (int) $c === 4 ? ' selected' : '' ?>><?= (int) $c ?></option>
                        <?php endforeach; ?>
                    </select>
                </span>
                <span>
                    <label for="strategySelect">Right column</label>
                    <select id="strategySelect" name="strategy" title="Which URL to load next to Live">
                        <option value="s3">S3 only</option>
                        <option value="current" selected>Current setup (Staging)</option>
                        <option value="strategy1">Strategy 1</option>
                        <option value="strategy2">Strategy 2</option>
                    </select>
                </span>
            </div>
        </div>

        <div class="comparison-grid" role="list">
            <?php foreach ($imagePaths as $idx => $rel): ?>
                <?php $u = urlsForPath($rel); ?>
                <article class="compare-card" role="listitem" data-path="<?= htmlspecialchars($rel, ENT_QUOTES, 'UTF-8') ?>">
                    <div class="compare-card__path" title="<?= htmlspecialchars($rel, ENT_QUOTES, 'UTF-8') ?>">
                        #<?= (int) ($idx + 1) ?> · <?= htmlspecialchars($rel, ENT_QUOTES, 'UTF-8') ?>
                    </div>
                    <div class="compare-card__pair">
                        <div class="compare-card__pane">
                            <span class="live">Live</span>
                            <div class="img-wrap">
                                <img
                                    class="js-live-img"
                                    src="<?= htmlspecialchars($u['live'], ENT_QUOTES, 'UTF-8') ?>"
                                    alt="Live: <?= htmlspecialchars($u['basename'], ENT_QUOTES, 'UTF-8') ?>"
                                    width="238"
                                    height="320"
                                    loading="lazy"
                                    decoding="async"
                                >
                            </div>
                        </div>
                        <div class="compare-card__pane">
                            <span class="strategy-label js-strategy-label">Current setup (Staging)</span>
                            <div class="img-wrap">
                                <img
                                    class="js-strategy-img"
                                    src="<?= htmlspecialchars($u['current'], ENT_QUOTES, 'UTF-8') ?>"
                                    alt=""
                                    width="238"
                                    height="320"
                                    loading="lazy"
                                    decoding="async"
                                    data-basename="<?= htmlspecialchars($u['basename'], ENT_QUOTES, 'UTF-8') ?>"
                                >
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
    <script>
(function () {
  const STORAGE_KEY = 'imageComparison:v2';
  const ORIGIN = <?= json_encode(CF_SITE_ORIGIN, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) ?>;
  const SIZES = <?= json_encode(SIZE_PRESETS) ?>;
  const S3_BASE = <?= json_encode(S3_PRODUCTS_BASE) ?>;

  const sizeSelect = document.getElementById('sizeSelect');
  const formatSelect = document.getElementById('cfFormatSelect');
  const qualitySelect = document.getElementById('cfQualitySelect');
  const strategySelect = document.getElementById('strategySelect');
  const columnSelect = document.getElementById('columnSelect');
  const pageEl = document.getElementById('comparisonPage');

  const labelText = {
    s3: 'S3 only',
    current: 'Current setup (Staging)',
    strategy1: 'Strategy 1',
    strategy2: 'Strategy 2'
  };

  function encodePath(norm) {
    return norm.split('/').map(function (p) { return encodeURIComponent(p); }).join('/');
  }

  function closestBucket(targetKey) {
    var group1 = ['thumbnail-m', 'thumbnail', 'search', 'popular-items', 'bulk-blank-shirts'];
    var group2 = ['fashion-wear-m', 'fashion-wear'];
    if (group1.indexOf(targetKey) !== -1) return SIZES['bulk-blank-shirts'];
    if (group2.indexOf(targetKey) !== -1) return SIZES['fashion-wear'];
    return SIZES['high-reso'];
  }

  function buildUrls(normRaw, sizeKey, f, q) {
    var norm = String(normRaw || '').replace(/\\/g, '/').replace(/^\/+|\/+$/g, '');
    var parts = norm.split('/');
    var filename = parts[parts.length - 1] || '';
    var size = SIZES[sizeKey] || SIZES['bulk-blank-shirts'];
    var w = size.w;
    var seg = 'w=' + w + ',f=' + f + ',q=' + q;
    var cfPrefix = ORIGIN + '/cdn-cgi/image/' + seg + '/' + S3_BASE;

    var liveUrl;
    var current;
    var strategy1;
    var strategy2;
    var s3 = S3_BASE + encodePath(norm);

    var isVendorColorPath = norm.indexOf('sanmar-colors/') === 0 || norm.indexOf('alpha-colors/') === 0;
    if (isVendorColorPath) {
      liveUrl = ORIGIN + '/image/' + encodePath(norm);
      var vendorCdn = cfPrefix + encodePath(norm);
      current = vendorCdn;
      strategy1 = vendorCdn;
      strategy2 = vendorCdn;
    } else {
      liveUrl = ORIGIN + '/image/' + encodePath(size.path + '/' + filename);
      current = cfPrefix + 'fashion-wear/' + encodeURIComponent(filename);
      strategy1 = cfPrefix + 'high-reso/' + encodeURIComponent(filename);
      var closest = closestBucket(sizeKey);
      strategy2 = cfPrefix + closest.path + '/' + encodeURIComponent(filename);
    }

    return { live: liveUrl, s3: s3, current: current, strategy1: strategy1, strategy2: strategy2 };
  }

  function strategyUrl(u, strategy) {
    if (strategy === 's3') return u.s3;
    if (strategy === 'current') return u.current;
    if (strategy === 'strategy1') return u.strategy1;
    return u.strategy2;
  }

  function readStored() {
    try {
      var raw = localStorage.getItem(STORAGE_KEY);
      if (!raw) return null;
      var p = JSON.parse(raw);
      return p && typeof p === 'object' ? p : null;
    } catch (_) {
      return null;
    }
  }

  function persist() {
    try {
      localStorage.setItem(STORAGE_KEY, JSON.stringify({
        strategy: strategySelect.value,
        size: sizeSelect.value,
        format: formatSelect.value,
        quality: qualitySelect.value,
        columns: columnSelect.value
      }));
    } catch (_) {}
  }

  function applyAll() {
    var sizeKey = sizeSelect.value;
    var f = formatSelect.value;
    var q = qualitySelect.value;
    var strategy = strategySelect.value;

    if (pageEl) {
      var cols = parseInt(columnSelect.value, 10);
      if (!isFinite(cols) || cols < 1) cols = 4;
      if (cols > 8) cols = 8;
      pageEl.style.setProperty('--compare-cols', String(cols));
    }

    document.querySelectorAll('.compare-card').forEach(function (card) {
      var norm = card.getAttribute('data-path');
      if (!norm) return;
      var u = buildUrls(norm, sizeKey, f, q);
      var liveImg = card.querySelector('.js-live-img');
      var simg = card.querySelector('.js-strategy-img');
      var base = simg ? simg.getAttribute('data-basename') || '' : '';

      if (liveImg) {
        liveImg.src = u.live;
        liveImg.alt = 'Live: ' + base;
      }
      if (simg) {
        simg.src = strategyUrl(u, strategy);
        simg.alt = labelText[strategy] + (base ? ': ' + base : '');
      }
    });

    document.querySelectorAll('.js-strategy-label').forEach(function (el) {
      el.textContent = labelText[strategy] || strategy;
    });

    persist();
  }

  function initFromStorage() {
    var p = readStored();
    if (!p) return;
    if (p.strategy && strategySelect.querySelector('option[value="' + p.strategy + '"]')) {
      strategySelect.value = p.strategy;
    }
    if (p.size && sizeSelect.querySelector('option[value="' + p.size + '"]')) {
      sizeSelect.value = p.size;
    }
    if (p.format && formatSelect.querySelector('option[value="' + p.format + '"]')) {
      formatSelect.value = p.format;
    }
    if (p.quality && qualitySelect.querySelector('option[value="' + p.quality + '"]')) {
      qualitySelect.value = p.quality;
    }
    if (p.columns != null && columnSelect.querySelector('option[value="' + p.columns + '"]')) {
      columnSelect.value = String(p.columns);
    }
  }

  initFromStorage();

  [sizeSelect, formatSelect, qualitySelect, strategySelect, columnSelect].forEach(function (el) {
    el.addEventListener('change', applyAll);
  });

  applyAll();
})();
    </script>
</body>
</html>
