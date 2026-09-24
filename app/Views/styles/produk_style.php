/* Copy semua style dari produk.php lama ke sini */
.produk-hero{text-align:center;padding:60px 0 50px;}
.produk-hero h1{font-size:3.4rem;font-weight:800;line-height:1.1;margin-bottom:20px;}
.produk-hero p{font-size:1.15rem;color:#c9c1b2;max-width:580px;margin:0 auto;line-height:1.8;}
.filter-bar{display:flex;justify-content:center;gap:12px;flex-wrap:wrap;margin:40px 0 50px;}
.filter-btn{background:rgba(255,255,255,0.04);border:1px solid #3d2410;border-radius:40px;color:#b8ae9a;padding:9px 22px;font-size:0.88rem;font-weight:600;cursor:pointer;transition:0.3s;letter-spacing:0.5px;}
.filter-btn:hover,.filter-btn.active{background:var(--gold);border-color:var(--gold);color:#1a1008;}
.produk-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(300px,1fr));gap:28px;margin-bottom:20px;}
.produk-item{background:linear-gradient(145deg,#251508,#1a1008);border:1px solid #3d2410;border-radius:28px;overflow:hidden;transition:0.4s cubic-bezier(0.175,0.885,0.32,1.275);box-shadow:0 8px 0 #120b04;opacity:0;animation:fadeInUp 0.8s ease forwards;}
.produk-item:hover{transform:translateY(-12px) scale(1.02);border-color:var(--gold-dark);box-shadow:0 24px 48px rgba(0,0,0,0.7),0 0 0 1px #d4af3740;}
.produk-img{width:100%;height:240px;background:radial-gradient(circle at 50% 40%,#3a2010,#1a1008);display:flex;align-items:center;justify-content:center;overflow:hidden;position:relative;}
.produk-img::after{content:'';position:absolute;inset:0;background:linear-gradient(to bottom,transparent 60%,#251508 100%);}
.produk-img img{max-width:75%;max-height:200px;object-fit:contain;transition:transform 0.5s ease;filter:drop-shadow(0 8px 24px rgba(0,0,0,0.6));}
.produk-item:hover .produk-img img{transform:scale(1.08) translateY(-6px);}
.produk-body{padding:24px 26px 28px;}
.produk-body .produk-tags{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:12px;}
.p-tag{font-size:0.75rem;padding:3px 12px;border-radius:40px;font-weight:700;letter-spacing:0.5px;text-transform:uppercase;}
.p-tag-skt{background:rgba(183,28,28,0.2);color:#f5a5a5;border:1px solid rgba(183,28,28,0.35);}
.p-tag-skm{background:rgba(212,175,55,0.15);color:#f5e18c;border:1px solid rgba(212,175,55,0.3);}
.produk-body h3{font-size:1.4rem;color:#f0ece4;margin-bottom:8px;font-weight:700;}
.produk-body p{font-size:0.92rem;color:#9c927e;line-height:1.7;margin-bottom:18px;}
.produk-specs{display:flex;flex-direction:column;gap:8px;margin-bottom:20px;padding:16px;background:rgba(255,255,255,0.03);border:1px solid rgba(212,175,55,0.1);border-radius:14px;}
.produk-spec-row{display:flex;justify-content:space-between;font-size:0.83rem;}
.produk-spec-row .spec-key{color:#6b6257;}
.produk-spec-row .spec-val{color:#c9c1b2;font-weight:600;}
.produk-body .btn-secondary{width:100%;justify-content:center;padding:11px 20px;font-size:0.9rem;}
.highlight-strip{background:linear-gradient(135deg,#2d1a0e,#1a1008);border:1px solid rgba(212,175,55,0.2);border-radius:28px;padding:40px 36px;display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:24px;text-align:center;margin:20px 0;}
.hs-item i{font-size:2rem;color:var(--gold);margin-bottom:10px;display:block;}
.hs-item .hs-val{font-size:1.8rem;font-weight:800;background:linear-gradient(145deg,#f5e18c,#d4af37);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;}
.hs-item .hs-lbl{font-size:0.82rem;color:#9c927e;margin-top:4px;}
@media(max-width:768px){.produk-hero h1{font-size:2.4rem;}.produk-grid{grid-template-columns:1fr 1fr;}}
@media(max-width:480px){.produk-grid{grid-template-columns:1fr;}}
