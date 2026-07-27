<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Image Strategy Benchmark</title>
  <style>
    body { font-family: Arial; background:#f4f6fa; padding:20px; }
    h1 { text-align:center;}
    h2 {font-size: 22px;}
    .controls { text-align:center; margin-bottom:20px; }
    select { padding:10px; margin:5px; }

    .switch { display:inline-flex; align-items:center; gap:10px; margin-left:10px; font-size:14px; }

    .switch input {
      appearance:none;
      width:50px;
      height:24px;
      background:#ccc;
      border-radius:20px;
      position:relative;
      cursor:pointer;
      transition:background 0.3s;
    }

    .switch input:checked { background:#4caf50; }

    .switch input::before {
      content:"";
      position:absolute;
      width:20px;
      height:20px;
      border-radius:50%;
      background:white;
      top:2px;
      left:2px;
      transition:0.3s;
    }

    .switch input:checked::before { transform:translateX(26px); }

    .grid {
      display:grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap:20px;
      max-width:1800px;
      margin:auto;
    }

    .card {
      background:white;
      padding:20px;
      border-radius:10px;
      box-shadow:0 8px 20px rgba(0,0,0,0.08);
    }

    img { width:100%; border-radius:8px; }

    .bar { height:10px; background:#ddd; border-radius:6px; overflow:hidden; margin-top:5px; }
    .fill { height:100%; width:0; background:#4caf50; }
    .meta { font-size:12px; color:#666; word-break:break-all; margin-top:6px; }
    .meta strong { color:#222; font-weight:700; }

    .controls label .info { margin-left:4px; vertical-align:middle; }

    .info {
      display:inline-flex;
      align-items:center;
      justify-content:center;
      cursor:pointer;
      position:relative;
      color:#555;
    }

    .info svg { width:16px; height:16px; }

    .info:hover::after {
      content:attr(data-tip);
      position:absolute;
      bottom:130%;
      left:50%;
      transform:translateX(-50%);
      background:#333;
      color:#fff;
      padding:6px 10px;
      border-radius:6px;
      font-size:12px;
      white-space:nowrap;
      z-index:10;
    }

    .info.html-tip:hover::after {
      content:none;
    }

    .tooltip-content {
      display:none;
      position:absolute;
      bottom:130%;
      left:50%;
      transform:translateX(-50%);
      background:#333;
      color:#fff;
      padding:10px 12px;
      border-radius:6px;
      font-size:12px;
      white-space:normal;
      text-align:left;
      min-width:220px;
      line-height:1.45;
      z-index:10;
    }

    .tooltip-content strong {
      display:block;
      margin-bottom:6px;
      color:#fff;
    }

    .tooltip-content span {
      display:block;
    }

    .info.html-tip:hover .tooltip-content {
      display:block;
    }

    .simulation-panel {
      max-width:1600px;
      margin:28px auto 0;
      background:white;
      border-radius:16px;
      box-shadow:0 8px 20px rgba(0,0,0,0.08);
      padding:24px;
    }

    .simulation-panel h2,
    .simulation-panel h3 {
      margin:0 0 14px;
    }

    .simulation-note {
      color:#5f6570;
      font-size:14px;
      margin:0 0 18px;
    }

    .simulation-grid {
      display:grid;
      grid-template-columns: 1.3fr 1fr;
      gap:24px;
      align-items:start;
    }

    .simulation-table {
      width:100%;
      border-collapse:collapse;
      font-size:14px;
    }

    .simulation-table th,
    .simulation-table td {
      padding:10px 12px;
      border-bottom:1px solid #e7eaf0;
      text-align:left;
      vertical-align:top;
    }

    .simulation-table th {
      font-size:12px;
      text-transform:uppercase;
      letter-spacing:0.04em;
      color:#6a7280;
    }

    .simulation-table tr:first-child td {
      font-weight:700;
    }

    .conclusion-box {
      background:#f7f9fc;
      border:1px solid #e4e8ef;
      border-radius:14px;
      padding:18px;
    }

    .conclusion-box p {
      margin:0 0 12px;
      color:#2b3340;
      line-height:1.5;
    }

    .conclusion-box p:last-child {
      margin-bottom:0;
    }

    .conclusion-kicker {
      font-size:12px;
      text-transform:uppercase;
      letter-spacing:0.08em;
      color:#6a7280;
      margin-bottom:10px;
    }

    @media (max-width: 1200px) {
      .grid {
        grid-template-columns: repeat(2, 1fr);
      }

      .simulation-grid {
        grid-template-columns: 1fr;
      }
    }

    @media (max-width: 700px) {
      .grid {
        grid-template-columns: 1fr;
      }

      .simulation-panel {
        padding:18px;
      }

      .simulation-table {
        font-size:13px;
      }
    }

    .resource-timing-panel h3 {
      margin: 22px 0 10px;
      font-size: 16px;
    }

    .resource-timing-panel code {
      font-size: 12px;
      background: #eef1f6;
      padding: 2px 6px;
      border-radius: 4px;
    }

    .resource-timing-panel .mono-small {
      font-size: 11px;
      word-break: break-all;
      color: #4a5568;
      max-width: 420px;
    }
  </style>
</head>
<body>

<h1>Image Strategy Benchmark</h1>

<div class="controls">
  <label>Target Size:</label>
  <select id="sizeSelect"></select>

  <label>Filename:</label>
  <select id="fileSelect">
    <option value="369_fm.jpg">369_fm.jpg</option>
    <option value="372_fm.jpg">372_fm.jpg</option>
    <option value="391a_fm.jpg">391a_fm.jpg</option>
    <option value="1828_fm.jpg">1828_fm.jpg</option>
    <option value="3895_fm.jpg">3895_fm.jpg</option>
    <option value="223_fm.jpg">223_fm.jpg</option>
    <option value="7269_fm.jpg">7269_fm.jpg</option>
    <option value="428_fm.jpg">428_fm.jpg</option>
    <option value="2523_fm.jpg">2523_fm.jpg</option>
    <option value="1909_fm.jpg">1909_fm.jpg</option>
  </select>

  <label>Image Source <span class="info" data-tip="Upstream image for Current Setup, R2 + Cloudflare, Cloudflare Image, and Strategy 1. fashion-wear = 480px, high-reso = 1200px.">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M11 17h2v-6h-2zm1.713-8.287Q13 8.425 13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9t.713-.288M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
  </span>:</label>
  <select id="imageSourceSelect">
    <option value="fashion-wear">fashion-wear (480px)</option>
    <option value="high-reso">high-reso (1200px)</option>
  </select>

  <label>Environment:</label>
  <select id="envSelect" title="bulkapparel.com subdomain for live + Cloudflare image URLs">
    <option value="5dev1459water">Dev (5dev1459water)</option>
    <option value="al333stage">Staging (al333stage)</option>
    <option value="www">Live (www)</option>
  </select>

  <label>CF format:</label>
  <select id="cfFormatSelect" title="Cloudflare Image format (f)">
    <option value="auto" selected>auto</option>
    <option value="webp">webp</option>
    <option value="avif">avif</option>
    <option value="jpeg">jpeg</option>
    <option value="png">png</option>
  </select>

  <label>CF quality:</label>
  <select id="cfQualitySelect" title="Cloudflare Image quality (q)">
    <option value="50">50</option>
    <option value="65">65</option>
    <option value="75">75</option>
    <option value="80">80</option>
    <option value="85">85</option>
    <option value="90" selected>90</option>
    <option value="95">95</option>
    <option value="100">100</option>
  </select>

  <label class="switch">
    <span>Warm Cache <span class="info" data-tip="Loading from cache">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M11 17h2v-6h-2zm1.713-8.287Q13 8.425 13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9t.713-.288M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
    </span></span>
    <input type="checkbox" id="cacheToggle" checked />
    <span>Cold Cache <span class="info" data-tip="First time loading image">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M11 17h2v-6h-2zm1.713-8.287Q13 8.425 13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9t.713-.288M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
    </span></span>
  </label>

</div>

<div class="grid">

  <div class="card">
    <h2>Live Setup <span class="info" data-tip="Uses the live BulkApparel image path for the selected size and filename">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M11 17h2v-6h-2zm1.713-8.287Q13 8.425 13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9t.713-.288M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
    </span></h2>
    <img id="img4" />
    <p>Load: <span id="t4">-</span> ms</p>
    <div class="bar"><div id="b4" class="fill"></div></div>
    <p class="meta" id="url4"></p>
  </div>



  <div class="card">
    <h2>S3 Only <span class="info" data-tip="Loads exact image size directly from S3">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M11 17h2v-6h-2zm1.713-8.287Q13 8.425 13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9t.713-.288M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
    </span></h2>
    <img id="img0" />
    <p>Load: <span id="t0">-</span> ms</p>
    <div class="bar"><div id="b0" class="fill"></div></div>
    <p class="meta" id="url0"></p>
  </div>

  <div class="card">
    <h2>R2 Only <span class="info" data-tip="Loads exact image size directly from Cloudflare R2 (images.pilak.dev)">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M11 17h2v-6h-2zm1.713-8.287Q13 8.425 13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9t.713-.288M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
    </span></h2>
    <img id="img5" />
    <p>Load: <span id="t5">-</span> ms</p>
    <div class="bar"><div id="b5" class="fill"></div></div>
    <p class="meta" id="url5"></p>
  </div>

  <div class="card">
    <h2>Current Setup <span class="info" data-tip="Resizes from the selected Image Source via Cloudflare Image Transform on bulkapparel.com">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M11 17h2v-6h-2zm1.713-8.287Q13 8.425 13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9t.713-.288M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
    </span></h2>
    <img id="img3" />
    <p>Load: <span id="t3">-</span> ms</p>
    <div class="bar"><div id="b3" class="fill"></div></div>
    <p class="meta" id="url3"></p>
  </div>

  <div class="card">
    <h2>R2 + Cloudflare <span class="info html-tip" data-tip="Resizes from the selected Image Source on R2 via Cloudflare Image Transform on pilak.dev">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M11 17h2v-6h-2zm1.713-8.287Q13 8.425 13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9t.713-.288M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
      <span class="tooltip-content">
        <strong>R2 + Image Transform</strong>
        <span>Example: <b>www.pilak.dev/cdn-cgi/image/...</b> + R2 origin URL</span>
      </span>
    </span></h2>
    <img id="img6" />
    <p>Load: <span id="t6">-</span> ms</p>
    <div class="bar"><div id="b6" class="fill"></div></div>
    <p class="meta" id="url6"></p>
  </div>

  <div class="card">
    <h2>Cloudflare Image <span class="info" data-tip="Cloudflare Images (imagedelivery.net) with flexible options from Target Size + CF format/quality; uses the selected Image Source catalog">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M11 17h2v-6h-2zm1.713-8.287Q13 8.425 13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9t.713-.288M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
    </span></h2>
    <img id="img7" />
    <p>Load: <span id="t7">-</span> ms</p>
    <div class="bar"><div id="b7" class="fill"></div></div>
    <p class="meta" id="url7"></p>
  </div>

  <div class="card">
    <h2>Strategy 1 <span class="info" data-tip="Resizes from the selected Image Source via Cloudflare Image Transform">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M11 17h2v-6h-2zm1.713-8.287Q13 8.425 13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9t.713-.288M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
    </span></h2>
    <img id="img1" />
    <p>Load: <span id="t1">-</span> ms</p>
    <div class="bar"><div id="b1" class="fill"></div></div>
    <p class="meta" id="url1"></p>
  </div>

  <div class="card">
    <h2>Strategy 2 <span class="info html-tip" data-tip="Optimized Buckets: Uses grouped bucket sizes before resizing:
- 56–238px → bulk-blank-shirts
- 328–480px → fashion-wear-m
- 600px+ → high-reso">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path fill="currentColor" d="M11 17h2v-6h-2zm1.713-8.287Q13 8.425 13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9t.713-.288M12 22q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/></svg>
      <span class="tooltip-content">
        <strong>Optimized Buckets</strong>
        <span>56-238px -> <b>bulk-blank-shirts</b></span>
        <span>328-480px -> <b>fashion-wear</b></span>
        <span>600px+ -> <b>high-reso</b></span>
      </span>
    </span></h2>
    <img id="img2" />
    <p>Load: <span id="t2">-</span> ms</p>
    <div class="bar"><div id="b2" class="fill"></div></div>
    <p class="meta" id="url2"></p>
  </div>

</div>

<section class="simulation-panel resource-timing-panel" id="resourceTimingPanel" style="display: none;">
  <h2>Resource timing (Performance API)</h2>
  <p class="simulation-note">
    Per-request breakdown from <code>performance.getEntriesByName(url)</code> (DNS, TCP, TTFB, download, total).
    Cached connections or cross-origin policies may show zeros for some fields.
  </p>
  <table class="simulation-table">
    <thead>
      <tr>
        <th>Strategy</th>
        <th>DNS</th>
        <th>TCP</th>
        <th>TTFB</th>
        <th>Download</th>
        <th>Total</th>
        <th>URL</th>
      </tr>
    </thead>
    <tbody id="resourceTimingBody"></tbody>
  </table>

  <h3>All image resources</h3>
  <p class="simulation-note">
    <code>performance.getEntriesByType(&quot;resource&quot;)</code> with <code>initiatorType === &quot;img&quot;</code>
    (name, duration, transfer sizes).
  </p>
  <table class="simulation-table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Duration</th>
        <th>transferSize</th>
        <th>encodedBodySize</th>
      </tr>
    </thead>
    <tbody id="allImgResourcesBody"></tbody>
  </table>
</section>

<section class="simulation-panel" style="display: none;">
  <h2>Simulation</h2>
  <p class="simulation-note" id="simulationNote"></p>
  <div class="simulation-grid">
    <div>
      <table class="simulation-table">
        <thead>
          <tr>
            <th>Rank</th>
            <th>Strategy</th>
            <th>Simulated Load</th>
            <th>Quality Risk</th>
            <th>Why</th>
          </tr>
        </thead>
        <tbody id="simulationBody"></tbody>
      </table>
    </div>
    <div class="conclusion-box">
      <div class="conclusion-kicker">Final Conclusion</div>
      <p id="conclusionHeadline"></p>
      <p id="conclusionDetail"></p>
      <p id="conclusionRecommendation"></p>
    </div>
  </div>
</section>

<script>
  const sizes = {
    'thumbnail-m': { path: 'thumbnail-m', w:56 },
    'thumbnail': { path: 'thumbnail', w:80 },
    'search': { path: 'search', w:116 },
    'popular-items': { path: 'popular-items', w:200 },
    'bulk-blank-shirts': { path: 'bulk-blank-shirts', w:238 },
    'fashion-wear-m': { path: 'fashion-wear-m', w:328 },
    'fashion-wear': { path: 'fashion-wear', w:480 },
    'high-reso': { path: 'high-reso', w:1200 }
  };

  const STORAGE_KEY = 'imageperf:v1';

  const ENV_SUBDOMAINS = ['5dev1459water', 'al333stage', 'www'];

  /** Cloudflare R2 public bucket + site that runs Image Resizing / cdn-cgi transforms */
  const R2_IMAGE_ORIGIN = 'https://images.pilak.dev';
  const R2_CF_SITE_ORIGIN = 'https://www.pilak.dev';

  const IMAGE_SOURCES = ['fashion-wear', 'high-reso'];

  /** Cloudflare Images (imagedelivery.net) — high-reso source */
  const CF_IMAGES = {
    '223_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/93d22082-8ba9-43f6-66ac-276fdd22d700',
    '7269_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/0ad1042a-e3ee-43c9-524e-b0e627ae4400',
    '391a_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/9cb5284b-8c0f-493e-c576-b5a1e0f31200',
    '369_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/0dd6d5b0-ec18-4c16-5b51-892489676200',
    '2523_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/279f9380-548c-4c62-c118-7fa5f62eea00',
    '428_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/4b9676a1-c297-49ec-f379-514637042400',
    '372_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/50a78dd9-d1ed-45a7-da1f-3395e8455d00',
    '3895_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/da5d4db0-9718-488d-e291-581966fba800',
    '1828_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/ec184dff-f3c3-4c3e-a1db-06e201a3db00',
    '1909_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/2cb4dd4f-bedf-4b81-145c-0e6dc73aa200'
  };

  /** Cloudflare Images (imagedelivery.net) — fashion-wear source */
  const CF_IMAGES_FASHION_WEAR = {
    '223_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/a1a72827-3bdc-4a09-2cde-65f531e31900',
    '7269_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/7ca04c87-aed8-4f31-8783-3ea8c47b1300',
    '391a_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/68a2c653-a6e7-4d33-af30-f21e16934a00',
    '369_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/72e6bfc8-c31f-46c4-8f66-28f5ce5a0100',
    '2523_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/af6e185c-e758-4a48-1086-ba77027e5c00',
    '428_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/f4c78f56-ba6f-440d-87ca-4c88c7c97300',
    '372_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/3ae2ec67-fb51-4577-b230-d0fa2ced0100',
    '3895_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/db36e3ae-3074-4d45-dc93-76a396267200',
    '1828_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/1a528357-6bd5-4f19-0e32-488508295e00',
    '1909_fm.jpg': 'https://imagedelivery.net/jnC5fJhqBG6GzleiHSzsvQ/916e847e-e784-4b65-4473-09feee731f00'
  };

  const CF_IMAGES_BY_SOURCE = {
    'high-reso': CF_IMAGES,
    'fashion-wear': CF_IMAGES_FASHION_WEAR
  };

  const select = document.getElementById('sizeSelect');
  const fileSelect = document.getElementById('fileSelect');
  const imageSourceSelect = document.getElementById('imageSourceSelect');
  const envSelect = document.getElementById('envSelect');
  const toggle = document.getElementById('cacheToggle');
  const cfFormatSelect = document.getElementById('cfFormatSelect');
  const cfQualitySelect = document.getElementById('cfQualitySelect');

  function bulkApparelOrigin(subdomain) {
    return `https://${subdomain}.bulkapparel.com`;
  }

  function getImageSourceKey() {
    return imageSourceSelect.value;
  }

  function getImageSourceMeta() {
    return sizes[getImageSourceKey()];
  }

  function readStoredControls() {
    try {
      const raw = localStorage.getItem(STORAGE_KEY);
      if (!raw) return null;
      const p = JSON.parse(raw);
      return p && typeof p === 'object' ? p : null;
    } catch (_) {
      return null;
    }
  }

  function initControlsFromStorage() {
    const p = readStoredControls();

    if (p && p.size && sizes[p.size]) select.value = p.size;
    else select.value = 'bulk-blank-shirts';

    if (p && p.file && [...fileSelect.options].some(o => o.value === p.file)) fileSelect.value = p.file;
    else fileSelect.value = '369_fm.jpg';

    if (p && p.imageSource && IMAGE_SOURCES.includes(p.imageSource)) {
      imageSourceSelect.value = p.imageSource;
    } else {
      imageSourceSelect.value = 'fashion-wear';
    }

    if (p && typeof p.cold === 'boolean') toggle.checked = p.cold;

    if (p && p.cfFormat && [...cfFormatSelect.options].some(o => o.value === p.cfFormat)) {
      cfFormatSelect.value = p.cfFormat;
    }
    if (p && p.cfQuality != null && [...cfQualitySelect.options].some(o => o.value === String(p.cfQuality))) {
      cfQualitySelect.value = String(p.cfQuality);
    }

    if (p && p.env && ENV_SUBDOMAINS.includes(p.env)) envSelect.value = p.env;
    else envSelect.value = '5dev1459water';
  }

  function persistControls() {
    try {
      localStorage.setItem(STORAGE_KEY, JSON.stringify({
        size: select.value,
        file: fileSelect.value,
        imageSource: imageSourceSelect.value,
        env: envSelect.value,
        cold: toggle.checked,
        cfFormat: cfFormatSelect.value,
        cfQuality: cfQualitySelect.value
      }));
    } catch (_) {}
  }

  function onControlsChange() {
    persistControls();
    runTest();
  }

  Object.keys(sizes).forEach(key => {
    const opt = document.createElement('option');
    opt.value = key;
    opt.textContent = `${key} (${sizes[key].w}px)`;
    select.appendChild(opt);
  });

  function getClosestBucket(targetKey) {
    const group1 = ['thumbnail-m','thumbnail','search','popular-items','bulk-blank-shirts'];
    const group2 = ['fashion-wear-m','fashion-wear'];

    if (group1.includes(targetKey)) return sizes['bulk-blank-shirts'];
    if (group2.includes(targetKey)) return sizes['fashion-wear'];
    return sizes['high-reso'];
  }

  function getCfImageOptions() {
    return { f: cfFormatSelect.value, q: cfQualitySelect.value };
  }

  function cfImageSegment(w, f, q) {
    return `w=${w},f=${f},q=${q}`;
  }

  function buildUrls(sizeKey, fileName, subdomain, sourceKey) {
    const size = sizes[sizeKey];
    const w = size.w;
    const { f, q } = getCfImageOptions();
    const seg = cfImageSegment(w, f, q);
    const origin = bulkApparelOrigin(subdomain);
    const sourcePath = sizes[sourceKey].path;

    const direct = `https://bulkapparel-images.s3.us-east-1.amazonaws.com/products/${size.path}/${fileName}`;

    const method1 = `${origin}/cdn-cgi/image/${seg}/https://bulkapparel-images.s3.us-east-1.amazonaws.com/products/${sourcePath}/${fileName}`;

    const closest = getClosestBucket(sizeKey);
    const method2 = `${origin}/cdn-cgi/image/${seg}/https://bulkapparel-images.s3.us-east-1.amazonaws.com/products/${closest.path}/${fileName}`;

    return { direct, method1, method2 };
  }

  /**
   * R2 paths mirror S3 layout: /images/{size-folder}/{file}
   * CF transform pulls from the absolute R2 URL (same idea as S3 behind cdn-cgi).
   */
  function buildR2Urls(sizeKey, fileName, sourceKey) {
    const size = sizes[sizeKey];
    const w = size.w;
    const { f, q } = getCfImageOptions();
    const seg = cfImageSegment(w, f, q);
    const sourcePath = sizes[sourceKey].path;
    const r2Direct = `${R2_IMAGE_ORIGIN}/images/${size.path}/${fileName}`;
    const r2CfCurrent = `${R2_CF_SITE_ORIGIN}/cdn-cgi/image/${seg}/${R2_IMAGE_ORIGIN}/images/${sourcePath}/${fileName}`;
    return { r2Direct, r2CfCurrent };
  }

  function buildCfImagesUrl(sizeKey, fileName, sourceKey) {
    const catalog = CF_IMAGES_BY_SOURCE[sourceKey];
    const base = catalog ? catalog[fileName] : null;
    if (!base) return null;
    const { w } = sizes[sizeKey];
    const { f, q } = getCfImageOptions();
    return `${base}/${cfImageSegment(w, f, q)}`;
  }

  function measure(imgEl, url, label, bar) {
    return new Promise(resolve => {
      const start = performance.now();
      const img = new Image();

      img.onload = () => {
        const t = Math.round(performance.now() - start);
        imgEl.src = url;
        label.textContent = t;
        bar.style.width = Math.min(t / 8, 100) + '%';
        resolve({ url, ok: true });
      };

      img.onerror = () => {
        label.textContent = '-';
        bar.style.width = '0%';
        resolve({ url, ok: false });
      };

      img.src = url;
    });
  }

  function findResourceTimingEntry(url) {
    const byName = performance.getEntriesByName(url);
    if (byName.length) return byName[byName.length - 1];
    const resources = performance.getEntriesByType('resource');
    let found = resources.find(e => e.name === url);
    if (found) return found;
    const strip = u => u.replace(/[?#].*$/, '');
    const base = strip(url);
    const matches = resources.filter(e => strip(e.name) === base);
    return matches.length ? matches[matches.length - 1] : null;
  }

  function breakdownFromEntry(e) {
    if (!e) return null;
    return {
      DNS: e.domainLookupEnd - e.domainLookupStart,
      TCP: e.connectEnd - e.connectStart,
      TTFB: e.responseStart - e.requestStart,
      Download: e.responseEnd - e.responseStart,
      Total: e.duration
    };
  }

  function fmtMs(v) {
    if (v == null || !isFinite(v)) return '—';
    return v.toFixed(2);
  }

  function escapeHtml(str) {
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;');
  }

  function renderResourceTimingTable(strategyRows) {
    const tbody = document.getElementById('resourceTimingBody');
    tbody.innerHTML = strategyRows.map(row => {
      const entry = findResourceTimingEntry(row.url);
      const b = breakdownFromEntry(entry);
      if (b) {
        console.log(`[${row.label}] getEntriesByName timing`, {
          DNS: b.DNS,
          TCP: b.TCP,
          TTFB: b.TTFB,
          Download: b.Download,
          Total: b.Total
        });
      }
      if (!b) {
        return `
          <tr>
            <td>${escapeHtml(row.label)}</td>
            <td colspan="5">—</td>
            <td class="mono-small">${escapeHtml(row.url)}</td>
          </tr>`;
      }
      return `
        <tr>
          <td>${escapeHtml(row.label)}</td>
          <td>${fmtMs(b.DNS)} ms</td>
          <td>${fmtMs(b.TCP)} ms</td>
          <td>${fmtMs(b.TTFB)} ms</td>
          <td>${fmtMs(b.Download)} ms</td>
          <td>${fmtMs(b.Total)} ms</td>
          <td class="mono-small">${escapeHtml(row.url)}</td>
        </tr>`;
    }).join('');
  }

  function renderAllImgResources() {
    const entries = performance.getEntriesByType('resource');
    const images = entries.filter(e => e.initiatorType === 'img');
    const tbody = document.getElementById('allImgResourcesBody');
    if (!images.length) {
      tbody.innerHTML = '<tr><td colspan="4">No img resource entries yet (or none recorded).</td></tr>';
      return;
    }
    images.forEach(img => {
      console.log({
        name: img.name,
        duration: img.duration.toFixed(2) + ' ms',
        transferSize: img.transferSize,
        encodedBodySize: img.encodedBodySize
      });
    });
    tbody.innerHTML = images.map(img => `
      <tr>
        <td class="mono-small">${escapeHtml(img.name)}</td>
        <td>${img.duration.toFixed(2)} ms</td>
        <td>${img.transferSize}</td>
        <td>${img.encodedBodySize}</td>
      </tr>
    `).join('');
  }

  function refreshPerformanceApiTables(strategyRows) {
    requestAnimationFrame(() => {
      requestAnimationFrame(() => {
        renderResourceTimingTable(strategyRows);
        renderAllImgResources();
      });
    });
  }

  function withCacheBust(url, cold) {
    if (!cold) return url;
    const separator = url.includes('?') ? '&' : '?';
    return `${url}${separator}cb=${Date.now()}`;
  }

  function formatUrlWithBoldFolder(url, folder) {
    return url.replace(folder, `<strong>${folder}</strong>`);
  }

  function getQualityRisk(sourceWidth, targetWidth) {
    if (sourceWidth < targetWidth) return 'High';
    if (sourceWidth <= targetWidth * 1.6) return 'Low';
    if (sourceWidth <= targetWidth * 2.5) return 'Medium';
    return 'Medium';
  }

  function scoreStrategy(config) {
    const resizeRatio = Math.max((config.sourceWidth - config.targetWidth) / Math.max(config.sourceWidth, 1), 0);
    const upscaleRatio = Math.max((config.targetWidth - config.sourceWidth) / Math.max(config.targetWidth, 1), 0);
    const coldBase = config.cold ? 130 : 42;
    const networkPenalty = config.pathType === 'live' ? 28 : 16;
    const cfPenalty = config.usesCloudflare ? (config.cold ? 48 : 10) : (config.cold ? 12 : 6);
    const resizePenalty = config.usesCloudflare ? resizeRatio * (config.cold ? 115 : 18) : 0;
    const oversizedPenalty = config.sourceWidth > config.targetWidth ? (config.sourceWidth / config.targetWidth - 1) * (config.cold ? 35 : 6) : 0;
    const upscalePenalty = upscaleRatio * (config.cold ? 70 : 18);
    const directBonus = !config.usesCloudflare && config.sourceWidth === config.targetWidth ? -18 : 0;
    const estimated = Math.round(coldBase + networkPenalty + cfPenalty + resizePenalty + oversizedPenalty + upscalePenalty + directBonus);

    return Math.max(estimated, config.cold ? 55 : 20);
  }

  function buildSimulationRows(sizeKey) {
    const target = sizes[sizeKey];
    const strategy2Source = getClosestBucket(sizeKey);
    const source = getImageSourceMeta();

    return [
      {
        name: 'Live Setup',
        sourceWidth: target.w,
        targetWidth: target.w,
        usesCloudflare: false,
        pathType: 'live'
      },
      {
        name: 'S3 Only',
        sourceWidth: target.w,
        targetWidth: target.w,
        usesCloudflare: false,
        pathType: 's3'
      },
      {
        name: 'R2 Only',
        sourceWidth: target.w,
        targetWidth: target.w,
        usesCloudflare: false,
        pathType: 's3'
      },
      {
        name: 'Current Setup',
        sourceWidth: source.w,
        targetWidth: target.w,
        usesCloudflare: true,
        pathType: 'cf'
      },
      {
        name: 'R2 + Cloudflare',
        sourceWidth: source.w,
        targetWidth: target.w,
        usesCloudflare: true,
        pathType: 'cf'
      },
      {
        name: 'Cloudflare Image',
        sourceWidth: source.w,
        targetWidth: target.w,
        usesCloudflare: true,
        pathType: 'cf-images'
      },
      {
        name: 'Strategy 1',
        sourceWidth: source.w,
        targetWidth: target.w,
        usesCloudflare: true,
        pathType: 'cf'
      },
      {
        name: 'Strategy 2',
        sourceWidth: strategy2Source.w,
        targetWidth: target.w,
        usesCloudflare: true,
        pathType: 'cf'
      }
    ];
  }

  function explainStrategy(row) {
    const sourceKey = getImageSourceKey();
    const sourceLabel = `${sizes[sourceKey].w}px ${sourceKey}`;

    if (!row.usesCloudflare && row.sourceWidth === row.targetWidth) {
      return 'Exact-size asset with no resize work.';
    }

    if (row.name === 'Current Setup') {
      return `Resizes from the ${sourceLabel} source via bulkapparel.com Image Transform.`;
    }

    if (row.name === 'Strategy 1') {
      return `Resizes from the ${sourceLabel} source via bulkapparel.com Image Transform.`;
    }

    if (row.name === 'Strategy 2') {
      return 'Uses the nearest source bucket before resizing.';
    }

    if (row.name === 'R2 + Cloudflare') {
      return `Resizes from the ${sourceLabel} asset on R2 via pilak.dev Image Transform.`;
    }

    if (row.name === 'Cloudflare Image') {
      return `Resizes on the fly from the ${sourceLabel} Cloudflare Images upload (w, f, q).`;
    }

    return 'Uses the selected live image path.';
  }

  function renderSimulation(sizeKey) {
    const cold = toggle.checked;
    const rows = buildSimulationRows(sizeKey).map(row => {
      const estimated = scoreStrategy({ ...row, cold });
      const qualityRisk = getQualityRisk(row.sourceWidth, row.targetWidth);
      return {
        ...row,
        estimated,
        qualityRisk,
        explanation: explainStrategy(row)
      };
    }).sort((a, b) => a.estimated - b.estimated);

    const body = document.getElementById('simulationBody');
    body.innerHTML = rows.map((row, index) => `
      <tr>
        <td>#${index + 1}</td>
        <td>${row.name}</td>
        <td>${row.estimated} ms</td>
        <td>${row.qualityRisk}</td>
        <td>${row.explanation}</td>
      </tr>
    `).join('');

    const winner = rows[0];
    const bestCloudflare = rows.filter(row => row.usesCloudflare).sort((a, b) => a.estimated - b.estimated)[0];
    const note = cold
      ? `Cold-cache simulation for ${sizes[sizeKey].path} (${sizes[sizeKey].w}px): first-request penalties emphasize resize work and oversized source images.`
      : `Warm-cache simulation for ${sizes[sizeKey].path} (${sizes[sizeKey].w}px): cache hits compress the gap, so operational simplicity matters more than transform cost.`;

    const headline = cold
      ? `${winner.name} is projected to be the fastest first-hit path for this size.`
      : `${winner.name} leads in warm-cache conditions, but the strategies are expected to converge.`;

    let detail = '';
    let recommendation = '';

    if (cold) {
      detail = bestCloudflare.name === 'Strategy 2'
        ? 'Among the Cloudflare-based options, Strategy 2 is the best balance because it avoids both the oversized high-res transform cost of Strategy 1 and the fixed 480px dependency of Current Setup.'
        : 'Among the Cloudflare-based options, the current selection minimizes transform overhead better than the alternatives.';
      recommendation = 'Final take: if you want the safest production compromise, keep exact-size direct delivery where possible and use Strategy 2 as the preferred dynamic-resize fallback.';
    } else {
      detail = 'Once cached, the transform-heavy options become much closer, so the decision shifts from raw speed toward cache hit rate, maintainability, and image quality consistency.';
      recommendation = `Final take: for warm traffic, ${bestCloudflare.name} is still the strongest Cloudflare candidate, but the practical conclusion is that cold-cache behavior should drive the architecture choice.`;
    }

    document.getElementById('simulationNote').textContent = note;
    document.getElementById('conclusionHeadline').textContent = headline;
    document.getElementById('conclusionDetail').textContent = detail;
    document.getElementById('conclusionRecommendation').textContent = recommendation;
  }

  function runTest() {
    const key = select.value;
    const fileName = fileSelect.value;
    const subdomain = envSelect.value;
    const sourceKey = getImageSourceKey();
    const sourcePath = sizes[sourceKey].path;
    const { direct, method1, method2 } = buildUrls(key, fileName, subdomain, sourceKey);
    const { r2Direct, r2CfCurrent } = buildR2Urls(key, fileName, sourceKey);
    const cfImagesBase = buildCfImagesUrl(key, fileName, sourceKey);
    const method2Folder = getClosestBucket(key).path;
    const siteOrigin = bulkApparelOrigin(subdomain);

    const cold = toggle.checked;
    const { f, q } = getCfImageOptions();
    const cfSeg = cfImageSegment(sizes[key].w, f, q);
    const liveSetup = `${siteOrigin}/image/${sizes[key].path}/${fileName}`;
    const currentSetup = method1;
    const liveSetupUrl = withCacheBust(liveSetup, cold);
    const directUrl = withCacheBust(direct, cold);
    const r2DirectUrl = withCacheBust(r2Direct, cold);
    const currentSetupUrl = withCacheBust(currentSetup, cold);
    const r2CfUrl = withCacheBust(r2CfCurrent, cold);
    const cfImagesUrl = cfImagesBase ? withCacheBust(cfImagesBase, cold) : null;
    const method1Url = withCacheBust(method1, cold);
    const method2Url = withCacheBust(method2, cold);

    document.getElementById('url4').innerHTML = formatUrlWithBoldFolder(liveSetup, sizes[key].path);
    document.getElementById('url3').innerHTML = formatUrlWithBoldFolder(currentSetup, sourcePath);
    document.getElementById('url0').innerHTML = formatUrlWithBoldFolder(direct, sizes[key].path);
    document.getElementById('url5').innerHTML = formatUrlWithBoldFolder(r2Direct, sizes[key].path);
    document.getElementById('url6').innerHTML = formatUrlWithBoldFolder(r2CfCurrent, sourcePath);
    document.getElementById('url7').innerHTML = cfImagesBase
      ? formatUrlWithBoldFolder(cfImagesBase, cfSeg)
      : '<strong>—</strong> No Cloudflare Images entry for this file';
    document.getElementById('url1').innerHTML = formatUrlWithBoldFolder(method1, sourcePath);
    document.getElementById('url2').innerHTML = formatUrlWithBoldFolder(method2, method2Folder);

    const strategyRows = [
      { label: 'Live Setup', url: liveSetupUrl },
      { label: 'S3 Only', url: directUrl },
      { label: 'R2 Only', url: r2DirectUrl },
      { label: 'Current Setup', url: currentSetupUrl },
      { label: 'R2 + Cloudflare', url: r2CfUrl },
      { label: 'Cloudflare Image', url: cfImagesUrl || '' },
      { label: 'Strategy 1', url: method1Url },
      { label: 'Strategy 2', url: method2Url }
    ];

    Promise.all([
      measure(document.getElementById('img4'), liveSetupUrl, document.getElementById('t4'), document.getElementById('b4')),
      measure(document.getElementById('img0'), directUrl, document.getElementById('t0'), document.getElementById('b0')),
      measure(document.getElementById('img5'), r2DirectUrl, document.getElementById('t5'), document.getElementById('b5')),
      measure(document.getElementById('img3'), currentSetupUrl, document.getElementById('t3'), document.getElementById('b3')),
      measure(document.getElementById('img6'), r2CfUrl, document.getElementById('t6'), document.getElementById('b6')),
      cfImagesUrl
        ? measure(document.getElementById('img7'), cfImagesUrl, document.getElementById('t7'), document.getElementById('b7'))
        : Promise.resolve({ url: '', ok: false }),
      measure(document.getElementById('img1'), method1Url, document.getElementById('t1'), document.getElementById('b1')),
      measure(document.getElementById('img2'), method2Url, document.getElementById('t2'), document.getElementById('b2'))
    ]).then(() => {
      refreshPerformanceApiTables(strategyRows);
    });

    renderSimulation(key);
  }

  initControlsFromStorage();

  select.addEventListener('change', onControlsChange);
  fileSelect.addEventListener('change', onControlsChange);
  imageSourceSelect.addEventListener('change', onControlsChange);
  envSelect.addEventListener('change', onControlsChange);
  toggle.addEventListener('change', onControlsChange);
  cfFormatSelect.addEventListener('change', onControlsChange);
  cfQualitySelect.addEventListener('change', onControlsChange);

  persistControls();
  runTest();
</script>

</body>
</html>
