.tentang-hero {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 50px;
    padding: 60px 0 70px;
    flex-wrap: wrap;
}

.tentang-hero-text {
    flex: 1 1 420px;
    min-width: 0;
}

.tentang-hero-img {
    flex: 1 1 380px;
    border-radius: 60px 20px 60px 20px;
    overflow: hidden;
    border: 1px solid rgba(212,175,55,0.3);
    box-shadow: 0 20px 50px rgba(0,0,0,0.6);
    min-height: 320px;
    max-height: 500px;
}

.tentang-hero-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

.info-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 24px;
    margin: 50px 0;
}

.info-box {
    background: linear-gradient(145deg, #251508, #1a1008);
    border: 1px solid #3d2410;
    border-radius: 24px;
    padding: 28px 22px;
    text-align: center;
    transition: 0.3s;
    box-shadow: 0 8px 0 #120b04;
    opacity: 0;
    animation: fadeInUp 0.8s ease forwards;
}

.info-box:nth-child(1) { animation-delay: 0.1s; }
.info-box:nth-child(2) { animation-delay: 0.2s; }
.info-box:nth-child(3) { animation-delay: 0.3s; }
.info-box:nth-child(4) { animation-delay: 0.4s; }

.info-box:hover {
    border-color: var(--gold-dark);
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.6);
}

.info-box i {
    font-size: 2.4rem;
    color: var(--gold);
    margin-bottom: 14px;
    display: inline-block;
    background: rgba(212,175,55,0.08);
    padding: 14px;
    border-radius: 50%;
}

.info-box .info-label {
    font-size: 0.8rem;
    color: #9c927e;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 6px;
}

.info-box .info-value {
    font-size: 1.05rem;
    font-weight: 600;
    color: #f0ece4;
    line-height: 1.4;
}

.sejarah-section {
    display: flex;
    gap: 50px;
    align-items: flex-start;
    flex-wrap: wrap;
    padding: 70px 0;
    border-top: 1px solid rgba(212,175,55,0.1);
}

.sejarah-text {
    flex: 1 1 420px;
}

.sejarah-text p {
    color: #c9c1b2;
    font-size: 1.05rem;
    line-height: 1.85;
    margin-bottom: 18px;
}

.sejarah-highlight {
    background: linear-gradient(145deg, #251508, #1a1008);
    border-left: 4px solid var(--gold);
    border-radius: 0 16px 16px 0;
    padding: 20px 24px;
    margin: 24px 0;
    color: #f5e18c;
    font-size: 1.1rem;
    font-style: italic;
    line-height: 1.7;
}

.sejarah-stats {
    flex: 0 0 280px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.stat-card {
    background: linear-gradient(145deg, #2d1a0e, #1a1008);
    border: 1px solid #3d2410;
    border-radius: 20px;
    padding: 24px 20px;
    text-align: center;
    transition: 0.3s;
    opacity: 0;
    animation: fadeInUp 0.8s ease forwards;
}

.stat-card:nth-child(1) { animation-delay: 0.2s; }
.stat-card:nth-child(2) { animation-delay: 0.4s; }
.stat-card:nth-child(3) { animation-delay: 0.6s; }

.stat-card:hover {
    border-color: var(--gold-dark);
    transform: translateX(6px);
}

.stat-card .stat-num {
    font-size: 2.8rem;
    font-weight: 800;
    background: linear-gradient(145deg, #f5e18c, #d4af37);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.stat-card .stat-label {
    font-size: 0.9rem;
    color: #9c927e;
    margin-top: 4px;
}

.produk-types {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
    gap: 28px;
    margin-top: 50px;
}

.produk-type-card {
    background: linear-gradient(145deg, #251508, #1a1008);
    border: 1px solid #3d2410;
    border-radius: 28px;
    padding: 36px 28px;
    transition: 0.4s;
    box-shadow: 0 8px 0 #120b04;
    opacity: 0;
    animation: fadeInUp 0.8s ease forwards;
}

.produk-type-card:nth-child(1) { animation-delay: 0.2s; }
.produk-type-card:nth-child(2) { animation-delay: 0.4s; }

.produk-type-card:hover {
    border-color: var(--gold-dark);
    transform: translateY(-10px);
    box-shadow: 0 24px 48px rgba(0,0,0,0.7), 0 0 0 1px #d4af3740;
}

.produk-type-card i {
    font-size: 2.8rem;
    color: var(--gold);
    margin-bottom: 18px;
    background: rgba(212,175,55,0.08);
    padding: 16px;
    border-radius: 60px;
    display: inline-block;
}

.produk-type-card h3 {
    font-size: 1.5rem;
    color: #f0ece4;
    margin-bottom: 10px;
}

.produk-type-card .tag {
    display: inline-block;
    background: rgba(183,28,28,0.2);
    color: #f5e18c;
    border: 1px solid rgba(212,175,55,0.3);
    border-radius: 40px;
    padding: 4px 14px;
    font-size: 0.78rem;
    font-weight: 600;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 14px;
}

.produk-type-card p {
    color: #b8ae9a;
    font-size: 0.95rem;
    line-height: 1.7;
}

@media (max-width: 768px) {
    .tentang-hero {
        padding: 30px 0;
        flex-direction: column;
    }
    
    .tentang-hero-text,
    .tentang-hero-img {
        flex: 1 1 100%;
    }
    
    .sejarah-stats {
        flex: 1 1 100%;
        flex-direction: row;
        flex-wrap: wrap;
    }
    
    .stat-card {
        flex: 1 1 120px;
    }
}
