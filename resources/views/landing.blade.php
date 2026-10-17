@extends('layouts.base')

@section('title', 'Beranda - MY RESILIENCE')
@section('description', 'MODEL CYBERCOUNSELING BERFOKUS SOLUSI BERBANTUAN SELF-HELP UNTUK MENINGKATKAN RESILIENSI PADA REMAJA DENGAN KERENTANAN PSIKOLOGIS')

@push('styles')
<style>
    /* ==========================================================================
       60-30-10 COLOR PALETTE SYSTEM
       - 60% Base: Crisp White & Soft Ice White (#ffffff, #f4f7fc)
       - 30% Primary: Deep Royal Blue (#0f3d91, #164db0, #1e56c2)
       - 10% Accent: Luminous Cyan / Aqua (#00e5ff, #06b6d4, #22d3ee)
       ========================================================================== */
    :root {
        /* 60% Base (White) */
        --base-white: #ffffff;
        --base-ice: #f4f7fc;
        --base-slate: #eef3fa;

        /* 30% Primary (Royal Blue) */
        --pri-blue-900: #0a2b6e;
        --pri-blue-800: #0f3d91;
        --pri-blue-700: #164db0;
        --pri-blue-600: #1d5ed4;
        --pri-blue-100: #dbeafe;
        --pri-blue-50: #eff6ff;

        /* 10% Accent (Cyan) */
        --acc-cyan-300: #67e8f9;
        --acc-cyan-400: #22d3ee;
        --acc-cyan-500: #06b6d4;
        --acc-cyan-glow: #00e5ff;

        /* Text Neutrals */
        --txt-dark: #0f172a;
        --txt-body: #475569;
        --txt-muted: #64748b;
    }

    /* Outer Frame (like the reference presentation) */
    .mr-page-wrapper {
        background-color: var(--base-ice);
        color: var(--txt-dark);
        font-family: 'Inter', system-ui, -apple-system, sans-serif;
        min-height: 100vh;
        overflow-x: hidden;
    }

    /* Main 60% White Canvas Container */
    .mr-main-canvas {
        background-color: var(--base-white);
        position: relative;
        overflow: hidden;
    }

    /* ==========================================================================
       HERO SECTION: 30% ROYAL BLUE ASYMMETRIC SWEEPING CURVE + 60% WHITE RIGHT
       ========================================================================== */
    .mr-hero-wrapper {
        position: relative;
        background-color: var(--base-white);
        overflow: hidden;
        padding-bottom: 2rem;
    }

    /* The sweeping Royal Blue organic wave shape on the left/top (30% Primary) */
    .mr-hero-blue-shape {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        pointer-events: none;
        display: none;
    }
    @media (min-width: 1024px) {
        .mr-hero-blue-shape {
            display: block;
        }
    }

    /* Mobile & Tablet Hero Top Royal Blue Background (< 1024px)
       Ensures white text & 4 feature icons ALWAYS stay on Royal Blue regardless of screen width/height */
    @media (max-width: 1023px) {
        .mr-hero-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: calc(100% - 370px);
            min-height: 520px;
            background: linear-gradient(145deg, #0b2e75 0%, #0f3d91 55%, #1750b8 100%);
            border-bottom-left-radius: 2.5rem;
            border-bottom-right-radius: 2.5rem;
            box-shadow: 0 18px 35px -10px rgba(15, 61, 145, 0.28);
            z-index: 1;
            pointer-events: none;
        }
    }
    @media (min-width: 640px) and (max-width: 1023px) {
        .mr-hero-wrapper::before {
            height: calc(100% - 430px);
            border-bottom-left-radius: 3.5rem;
            border-bottom-right-radius: 3.5rem;
        }
    }

    /* Navbar sitting seamlessly across the Blue (left) and White (right) split */
    .mr-nav {
        position: relative;
        z-index: 30;
        max-width: 1280px;
        margin: 0 auto;
        padding: 1rem 1rem 0.75rem;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 0.75rem;
    }
    @media (min-width: 640px) {
        .mr-nav {
            padding: 1.5rem 1.5rem 1rem;
            gap: 1rem;
        }
    }
    @media (min-width: 1024px) {
        .mr-nav {
            padding: 1.5rem 2rem 1rem;
        }
    }

    .mr-nav-brand {
        display: flex;
        align-items: center;
        gap: 0.65rem;
        text-decoration: none;
        min-width: 0;
    }

    .mr-nav-dock {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.96);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        padding: 0.35rem 0.45rem 0.35rem 0.85rem;
        border-radius: 9999px;
        border: 1.5px solid rgba(191, 219, 254, 0.9);
        box-shadow: 0 10px 28px -6px rgba(15, 61, 145, 0.18);
        flex-shrink: 0;
    }
    @media (min-width: 640px) {
        .mr-nav-dock {
            gap: 1rem;
            padding: 0.45rem 0.55rem 0.45rem 1.25rem;
        }
    }

    .mr-nav-links {
        display: none;
        align-items: center;
        gap: 1.4rem;
        padding-left: 0.35rem;
    }
    @media (min-width: 1024px) {
        .mr-nav-links {
            display: flex;
        }
    }

    .mr-nav-link {
        font-size: 0.8rem;
        font-weight: 800;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        color: var(--pri-blue-800);
        text-decoration: none;
        transition: color 0.2s ease;
    }
    .mr-nav-link:hover {
        color: var(--acc-cyan-500);
    }

    /* Mobile & Tablet Collapsible Nav Menu (< 1024px) */
    .mr-mobile-menu {
        position: relative;
        z-index: 25;
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1rem;
    }
    @media (min-width: 640px) {
        .mr-mobile-menu {
            padding: 0 1.5rem;
        }
    }
    @media (min-width: 1024px) {
        .mr-mobile-menu {
            display: none !important;
        }
    }

    /* Pill Button in Navbar (like "LONGE" in reference image) */
    .mr-pill-blue {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.5rem 1.1rem;
        background: var(--pri-blue-800);
        color: #ffffff !important;
        font-size: 0.75rem;
        font-weight: 800;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        border-radius: 9999px;
        box-shadow: 0 8px 20px -4px rgba(15, 61, 145, 0.35);
        text-decoration: none;
        transition: all 0.25s ease;
        white-space: nowrap;
    }
    @media (min-width: 640px) {
        .mr-pill-blue {
            padding: 0.6rem 1.6rem;
            font-size: 0.8rem;
        }
    }
    .mr-pill-blue:hover {
        background: var(--pri-blue-700);
        transform: translateY(-2px);
        box-shadow: 0 12px 24px -4px rgba(15, 61, 145, 0.45);
    }

    /* Cyan Accent Pill CTA Button (like "COTAE" in reference image - 10% Accent) */
    .mr-pill-cyan {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #22d3ee 0%, #06b6d4 100%);
        color: #ffffff !important;
        font-size: 0.8rem;
        font-weight: 800;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        border-radius: 9999px;
        box-shadow: 0 10px 25px -3px rgba(6, 182, 212, 0.48), 0 0 15px rgba(34, 211, 238, 0.35);
        text-decoration: none;
        transition: all 0.25s ease;
        border: none;
    }
    @media (min-width: 640px) {
        .mr-pill-cyan {
            padding: 0.85rem 2rem;
            font-size: 0.875rem;
        }
    }
    .mr-pill-cyan:hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 14px 30px -3px rgba(6, 182, 212, 0.65), 0 0 22px rgba(34, 211, 238, 0.5);
    }

    /* Hero Content Grid */
    .mr-hero-grid {
        position: relative;
        z-index: 10;
        max-width: 1280px;
        margin: 0 auto;
        padding: 1.25rem 1rem 2.5rem;
        display: grid;
        grid-template-columns: 1fr;
        gap: 3.5rem;
        align-items: center;
    }
    @media (min-width: 640px) {
        .mr-hero-grid {
            padding: 2rem 1.5rem 3.5rem;
            gap: 4rem;
        }
    }
    @media (min-width: 1024px) {
        .mr-hero-grid {
            grid-template-columns: 1.15fr 0.85fr;
            padding: 3rem 2rem 6.5rem;
            gap: 3rem;
        }
    }

    /* Institutional Partner Badge inside Hero */
    .mr-partner-pill {
        display: inline-flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 0.65rem 1rem;
        background: rgba(255, 255, 255, 0.96);
        padding: 0.55rem 0.9rem;
        border-radius: 1rem;
        box-shadow: 0 10px 25px -5px rgba(10, 43, 110, 0.25);
        margin-bottom: 1.25rem;
        border: 2px solid rgba(34, 211, 238, 0.4);
        max-width: 100%;
    }
    @media (min-width: 640px) {
        .mr-partner-pill {
            padding: 0.6rem 1.25rem;
            margin-bottom: 1.5rem;
        }
    }

    /* 4 Feature Icons Row inside Blue Hero (like Recorded sessions | Practical Learning | Certification | Lifetime access) */
    .mr-hero-features {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 0.85rem;
        margin-top: 1.75rem;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(255, 255, 255, 0.16);
    }
    @media (min-width: 640px) {
        .mr-hero-features {
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 1rem;
            margin-top: 2.25rem;
            padding-top: 1.75rem;
        }
    }
    .mr-hero-feature-item {
        display: flex;
        align-items: center;
        gap: 0.6rem;
        color: #ffffff;
    }
    .mr-hero-feature-icon {
        width: 2.15rem;
        height: 2.15rem;
        border-radius: 0.65rem;
        background: rgba(34, 211, 238, 0.18);
        border: 1px solid rgba(103, 232, 249, 0.45);
        color: var(--acc-cyan-300);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    /* ==========================================================================
       RIGHT HERO: GLOWING DOUBLE CYAN PORTAL RING & ORBITING 3D BUBBLES
       ========================================================================== */
    .mr-portal-stage {
        position: relative;
        width: 265px;
        height: 265px;
        margin: 0.5rem auto 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    @media (min-width: 400px) {
        .mr-portal-stage {
            width: 305px;
            height: 305px;
        }
    }
    @media (min-width: 640px) {
        .mr-portal-stage {
            width: 370px;
            height: 370px;
            margin: 0 auto;
        }
    }
    @media (min-width: 1024px) {
        .mr-portal-stage {
            width: 390px;
            height: 390px;
        }
    }

    /* Outer & Inner Glowing Neon Cyan Rings (10% Cyan Accent) */
    .mr-cyan-ring-outer {
        position: absolute;
        inset: 12px;
        border-radius: 9999px;
        border: 5px solid #22d3ee;
        box-shadow:
            0 0 35px rgba(0, 229, 255, 0.65),
            inset 0 0 25px rgba(0, 229, 255, 0.45);
        animation: mrPulseRing 4s ease-in-out infinite;
    }
    @media (min-width: 640px) {
        .mr-cyan-ring-outer {
            border-width: 6px;
        }
    }
    .mr-cyan-ring-inner {
        position: absolute;
        inset: 26px;
        border-radius: 9999px;
        border: 3px solid #a5f3fc;
        box-shadow: 0 0 20px rgba(34, 211, 238, 0.5);
    }

    .mr-portal-avatar {
        position: relative;
        width: calc(100% - 68px);
        height: calc(100% - 68px);
        border-radius: 9999px;
        overflow: hidden;
        background: radial-gradient(circle at 50% 35%, #3b82f6 0%, #1d4ed8 60%, #0f3d91 100%);
        box-shadow: inset 0 0 30px rgba(0, 229, 255, 0.35);
        z-index: 5;
    }
    .mr-portal-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Orbiting 3D Icon Bubbles */
    @keyframes mrFloatBubble1 {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
    }
    @keyframes mrFloatBubble2 {
        0%, 100% { transform: translateY(0px) scale(1); }
        50% { transform: translateY(8px) scale(1.04); }
    }
    @keyframes mrPulseRing {
        0%, 100% { box-shadow: 0 0 30px rgba(0, 229, 255, 0.6), inset 0 0 22px rgba(0, 229, 255, 0.4); }
        50% { box-shadow: 0 0 48px rgba(0, 229, 255, 0.85), inset 0 0 32px rgba(0, 229, 255, 0.6); }
    }

    .mr-orbit-bubble {
        position: absolute;
        border-radius: 9999px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 15;
        box-shadow: 0 12px 25px -4px rgba(15, 61, 145, 0.35);
    }
    .mr-bubble-cyan {
        background: radial-gradient(circle at 30% 30%, #67e8f9 0%, #06b6d4 70%, #0e7490 100%);
        color: #ffffff;
        border: 2px solid rgba(255, 255, 255, 0.7);
        animation: mrFloatBubble1 5s ease-in-out infinite;
    }
    .mr-bubble-blue {
        background: radial-gradient(circle at 30% 30%, #60a5fa 0%, #2563eb 65%, #1e3a8a 100%);
        color: #ffffff;
        border: 2px solid rgba(165, 243, 252, 0.6);
        animation: mrFloatBubble2 6s ease-in-out infinite;
    }
    .mr-bubble-white {
        background: #ffffff;
        color: var(--pri-blue-800);
        border: 2px solid var(--acc-cyan-400);
        box-shadow: 0 10px 25px rgba(6, 182, 212, 0.25);
        animation: mrFloatBubble1 4.5s ease-in-out 1s infinite;
    }

    /* ==========================================================================
       LOWER SHOWCASE SECTION (60% WHITE BASE + 30% ROYAL BLUE CARD + 10% CYAN)
       ========================================================================== */
    .mr-showcase-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 1.75rem;
        align-items: stretch;
    }
    @media (min-width: 1024px) {
        .mr-showcase-grid {
            grid-template-columns: 1.1fr 0.9fr;
            gap: 2.25rem;
        }
    }

    /* Crisp White Card (Left column in Sambutan section) */
    .mr-welcome-card {
        background: #ffffff;
        border: 1px solid rgba(226, 232, 240, 0.95);
        border-radius: 1.75rem;
        padding: 1.75rem 1.5rem;
        box-shadow: 0 14px 35px -10px rgba(15, 61, 145, 0.08), 0 4px 12px -2px rgba(15, 23, 42, 0.04);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }
    @media (min-width: 640px) {
        .mr-welcome-card {
            padding: 2.25rem 2.25rem;
        }
    }

    /* Royal Blue Interactive Card (Right column in reference image) */
    .mr-blue-panel {
        background: linear-gradient(145deg, #15479e 0%, #0f3d91 60%, #0a2b6e 100%);
        border-radius: 1.75rem;
        padding: 1.75rem 1.5rem;
        color: #ffffff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 20px 40px -12px rgba(15, 61, 145, 0.35);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }
    @media (min-width: 640px) {
        .mr-blue-panel {
            padding: 2.25rem 2.25rem;
        }
    }

    /* Cyan Wavy Blobs at top-right of the Royal Blue Panel (just like reference image) */
    .mr-blue-panel-blob-1 {
        position: absolute;
        top: -28px;
        right: 55px;
        width: 90px;
        height: 65px;
        background: linear-gradient(135deg, #22d3ee, #06b6d4);
        border-radius: 40% 60% 65% 35% / 45% 55% 45% 55%;
        opacity: 0.9;
        pointer-events: none;
    }
    .mr-blue-panel-blob-2 {
        position: absolute;
        top: -15px;
        right: -20px;
        width: 95px;
        height: 85px;
        background: linear-gradient(135deg, #06b6d4, #0891b2);
        border-radius: 55% 45% 35% 65% / 55% 45% 55% 45%;
        opacity: 0.85;
        pointer-events: none;
    }

    /* Circular Icon Buttons Row inside Royal Blue Panel */
    .mr-circle-node {
        width: 2.85rem;
        height: 2.85rem;
        border-radius: 9999px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 800;
        font-size: 0.85rem;
        cursor: pointer;
        transition: all 0.25s ease;
        border: 2px solid rgba(147, 197, 253, 0.3);
        background: rgba(255, 255, 255, 0.08);
        color: #bfdbfe;
    }
    .mr-circle-node.active,
    .mr-circle-node:hover {
        border-color: var(--acc-cyan-400);
        background: rgba(34, 211, 238, 0.2);
        color: #ffffff;
        box-shadow: 0 0 16px rgba(0, 229, 255, 0.55);
        transform: scale(1.08);
    }

    /* Cyan Slider / Progress Track inside Royal Blue Panel */
    .mr-cyan-track {
        position: relative;
        height: 6px;
        background: rgba(255, 255, 255, 0.16);
        border-radius: 9999px;
        margin: 1.75rem 0 1.25rem;
    }
    .mr-cyan-track-fill {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        background: linear-gradient(90deg, #06b6d4 0%, #00e5ff 100%);
        border-radius: 9999px;
        box-shadow: 0 0 12px rgba(0, 229, 255, 0.7);
        transition: width 0.35s ease;
    }
    .mr-cyan-track-thumb {
        position: absolute;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 18px;
        height: 18px;
        border-radius: 9999px;
        background: #00e5ff;
        border: 3px solid #0f3d91;
        box-shadow: 0 0 0 3px #22d3ee, 0 0 15px rgba(0, 229, 255, 0.9);
        transition: left 0.35s ease;
    }

    /* ==========================================================================
       FEATURED CARDS (FOR LANGKAH & PENGEMBANG - LIKE "FEATURED COURSE" CARDS)
       ========================================================================== */
    .mr-feature-card {
        background: #ffffff;
        border-radius: 1.5rem;
        padding: 1.25rem;
        border: 1px solid #e2e8f0;
        box-shadow: 0 12px 30px -8px rgba(15, 61, 145, 0.08), 0 4px 12px -2px rgba(15, 23, 42, 0.04);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }
    .mr-feature-card:hover {
        transform: translateY(-6px);
        border-color: var(--acc-cyan-400);
        box-shadow: 0 20px 40px -12px rgba(15, 61, 145, 0.16);
    }

    /* Blue/Cyan Framed Portrait Box inside Card */
    .mr-card-portrait {
        position: relative;
        height: 165px;
        border-radius: 1.1rem;
        background: radial-gradient(circle at 50% 30%, #2563eb 0%, #0f3d91 100%);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.15rem;
    }
    .mr-feature-card:nth-child(even) .mr-card-portrait {
        background: radial-gradient(circle at 50% 30%, #06b6d4 0%, #15479e 100%);
    }

    .mr-card-pill-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.4rem 1.1rem;
        background: var(--pri-blue-800);
        color: #ffffff;
        font-size: 0.7rem;
        font-weight: 800;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        border-radius: 9999px;
        transition: all 0.2s ease;
    }
    .mr-feature-card:hover .mr-card-pill-btn {
        background: var(--acc-cyan-500);
        box-shadow: 0 6px 15px rgba(6, 182, 212, 0.35);
    }

    /* Step Cards Grid */
    .mr-step-item {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 1.35rem;
        padding: 1.35rem 1.4rem;
        display: flex;
        align-items: flex-start;
        gap: 1rem;
        box-shadow: 0 8px 22px -6px rgba(15, 61, 145, 0.06);
        transition: all 0.25s ease;
        position: relative;
        overflow: hidden;
        height: 100%;
    }
    .mr-step-item:hover {
        border-color: var(--acc-cyan-400);
        transform: translateY(-3px);
        box-shadow: 0 14px 30px -8px rgba(15, 61, 145, 0.14);
    }
    .mr-step-badge {
        width: 2.6rem;
        height: 2.6rem;
        border-radius: 0.85rem;
        background: var(--pri-blue-800);
        color: #ffffff;
        font-weight: 800;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 6px 14px rgba(15, 61, 145, 0.25);
        transition: all 0.25s ease;
    }
    .mr-step-item:hover .mr-step-badge {
        background: linear-gradient(135deg, #22d3ee 0%, #06b6d4 100%);
        box-shadow: 0 6px 16px rgba(6, 182, 212, 0.4);
    }
</style>
@endpush

@section('body')
<div class="mr-page-wrapper">
    <div class="mr-main-canvas">

        {{-- ==================================================================
             HERO SECTION (30% Royal Blue Sweeping Wave + 60% White + 10% Cyan)
             ================================================================== --}}
        <div id="beranda" class="mr-hero-wrapper">

            {{-- Asymmetric Royal Blue Organic Wave Shape (matches reference image) --}}
            <svg class="mr-hero-blue-shape" viewBox="0 0 1440 820" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="heroRoyalBlue" x1="0%" y1="0%" x2="85%" y2="100%">
                        <stop offset="0%" stop-color="#0b2e75"/>
                        <stop offset="55%" stop-color="#0f3d91"/>
                        <stop offset="100%" stop-color="#1750b8"/>
                    </linearGradient>
                    <linearGradient id="heroSoftShadowWave" x1="0%" y1="0%" x2="100%" y2="0%">
                        <stop offset="0%" stop-color="#dbeafe" stop-opacity="0.7"/>
                        <stop offset="100%" stop-color="#eff6ff" stop-opacity="0.2"/>
                    </linearGradient>
                </defs>
                {{-- Soft secondary shadow wave underneath --}}
                <path d="M0,0 L690,0 C890,140 1040,410 900,630 C780,790 530,795 320,745 C155,705 55,755 0,805 Z" fill="url(#heroSoftShadowWave)"/>
                {{-- Main 30% Primary Royal Blue asymmetric wave --}}
                <path d="M0,0 L645,0 C845,120 1005,395 865,610 C750,770 510,770 305,720 C145,680 50,735 0,785 Z" fill="url(#heroRoyalBlue)"/>
            </svg>

            {{-- Top Navbar --}}
            <header class="mr-nav">
                {{-- Brand on the Royal Blue side --}}
                <a href="/" class="mr-nav-brand">
                    <img src="{{ asset('image/logo-mark.png') }}" alt="MY RESILIENCE" class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl object-cover border-2 border-cyan-300/60 shadow-lg flex-shrink-0">
                    <div class="min-w-0">
                        <span class="text-sm sm:text-lg font-extrabold tracking-wider text-white block leading-none truncate">MY RESILIENCE</span>
                        <span class="text-[9px] sm:text-[10px] font-bold text-cyan-300 tracking-widest uppercase block mt-0.5 truncate">KEMENDIKTI SAINTEK • UM</span>
                    </div>
                </a>

                {{-- Links & Pill CTA inside Crisp White Pill Dock --}}
                <div class="mr-nav-dock">
                    <nav class="mr-nav-links">
                        <a href="#beranda" class="mr-nav-link">Beranda</a>
                        <a href="#sambutan" class="mr-nav-link">Tentang</a>
                        <a href="#langkah" class="mr-nav-link">Langkah</a>
                        <a href="#pengembang" class="mr-nav-link">Pengembang</a>
                        <a href="#kontak" class="mr-nav-link">Kontak</a>
                    </nav>

                    <div class="flex items-center gap-1.5 sm:gap-2">
                        @auth
                            <a href="{{ route('dashboard') }}" class="mr-pill-blue">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="mr-pill-blue">
                                Login
                            </a>
                        @endauth

                        {{-- Mobile & Tablet Hamburger Button (< 1024px) --}}
                        <button type="button" onclick="toggleLandingMobileMenu()" class="lg:hidden p-2 rounded-full text-blue-900 hover:bg-blue-50 transition-colors focus:outline-none" aria-label="Buka Navigasi">
                            <svg id="mr-menu-icon-open" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                            <svg id="mr-menu-icon-close" class="w-5 h-5 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.2" d="M6 18L18 6M6 6l12 12"/></svg>
                        </button>
                    </div>
                </div>
            </header>

            {{-- Mobile & Tablet Collapsible Navigation Menu (< 1024px) --}}
            <div id="mr-mobile-nav" class="mr-mobile-menu hidden">
                <div class="bg-white/95 backdrop-blur-md rounded-2xl border border-blue-100 shadow-xl p-4 mt-2 space-y-2 animate-fade-in">
                    <div class="grid grid-cols-2 sm:grid-cols-5 gap-2">
                        <a href="#beranda" onclick="toggleLandingMobileMenu()" class="px-3 py-2 rounded-xl text-xs font-extrabold uppercase tracking-wider text-blue-900 hover:bg-blue-50 hover:text-cyan-600 transition-colors text-center">Beranda</a>
                        <a href="#sambutan" onclick="toggleLandingMobileMenu()" class="px-3 py-2 rounded-xl text-xs font-extrabold uppercase tracking-wider text-blue-900 hover:bg-blue-50 hover:text-cyan-600 transition-colors text-center">Tentang</a>
                        <a href="#langkah" onclick="toggleLandingMobileMenu()" class="px-3 py-2 rounded-xl text-xs font-extrabold uppercase tracking-wider text-blue-900 hover:bg-blue-50 hover:text-cyan-600 transition-colors text-center">Langkah</a>
                        <a href="#pengembang" onclick="toggleLandingMobileMenu()" class="px-3 py-2 rounded-xl text-xs font-extrabold uppercase tracking-wider text-blue-900 hover:bg-blue-50 hover:text-cyan-600 transition-colors text-center">Pengembang</a>
                        <a href="#kontak" onclick="toggleLandingMobileMenu()" class="col-span-2 sm:col-span-1 px-3 py-2 rounded-xl text-xs font-extrabold uppercase tracking-wider text-blue-900 hover:bg-blue-50 hover:text-cyan-600 transition-colors text-center">Kontak</a>
                    </div>
                    @guest
                    <div class="pt-2 border-t border-slate-100 flex sm:hidden items-center gap-2">
                        <a href="{{ route('login') }}" class="flex-1 py-2.5 rounded-xl bg-blue-800 text-xs font-extrabold uppercase tracking-wider text-white text-center">
                            Login
                        </a>
                    </div>
                    @endguest
                </div>
            </div>

            {{-- Hero Main Content Grid --}}
            <div class="mr-hero-grid">

                {{-- Left Column: Inside the 30% Royal Blue Shape --}}
                <div class="text-white">
                    {{-- Institutional Logos Pill (KEMENDIKTI SAINTEK; Saintek berdampak, UM) --}}
                    <div class="mr-partner-pill">
                        <div class="flex items-center gap-2.5">
                            <img src="{{ asset('image/logo/Diktisaintek.png') }}" alt="KEMENDIKTI SAINTEK - Saintek Berdampak" class="h-7 sm:h-9 object-contain flex-shrink-0">
                            <div class="text-left">
                                <p class="text-[10px] font-extrabold text-slate-900 leading-tight">KEMENDIKTI SAINTEK</p>
                                <p class="text-[9px] font-bold text-cyan-600 leading-tight">Saintek Berdampak</p>
                            </div>
                        </div>
                        <div class="hidden sm:block h-6 w-px bg-slate-200"></div>
                        <div class="flex items-center gap-2.5">
                            <img src="{{ asset('image/logo/logo-um.webp') }}" alt="Universitas Negeri Malang (UM)" class="h-7 sm:h-9 object-contain flex-shrink-0">
                            <div class="text-left">
                                <p class="text-[10px] font-extrabold text-slate-900 leading-tight">UNIVERSITAS NEGERI MALANG</p>
                                <p class="text-[9px] font-bold text-blue-700 leading-tight">FIP • Bimbingan & Konseling</p>
                            </div>
                        </div>
                    </div>

                    {{-- Cyan Accent Subtitle Tag --}}
                    <div class="inline-flex items-start sm:items-center gap-2 px-3.5 py-2 sm:py-1.5 rounded-2xl sm:rounded-full bg-cyan-400/15 border border-cyan-300/40 text-cyan-200 text-[10px] sm:text-[11px] font-bold uppercase tracking-wider mb-4 leading-relaxed">
                        <span class="w-2 h-2 rounded-full bg-cyan-300 flex-shrink-0 mt-1 sm:mt-0"></span>
                        <span>Model Cybercounseling Berfokus Solusi Berbantuan Self-Help untuk Meningkatkan Resiliensi pada Remaja dengan Kerentanan Psikologis</span>
                    </div>

                    {{-- Main Title --}}
                    <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight text-white mb-4">
                        SELAMAT DATANG DI LAMAN <span class="text-cyan-300">MY RESILIENCE!</span>
                    </h1>

                    {{-- Short Hero Lead --}}
                    <p class="text-sm sm:text-base text-blue-100 leading-relaxed max-w-xl mb-6 sm:mb-8 font-normal">
                        Halo! Selamat datang di <strong class="text-white font-bold">MY RESILIENCE</strong>—ruang aman berbasis <em>Solution-Focused Brief Counseling (SFBC)</em> dan modul <em>self-help</em> interaktif yang dirancang khusus untuk mendampingimu tumbuh menjadi pribadi yang lebih tangguh.
                    </p>

                    {{-- Hero Action Buttons (10% Cyan Accent CTA) --}}
                    <div class="flex flex-wrap items-center gap-3 sm:gap-3.5">
                        @auth
                            <a href="{{ route('dashboard') }}" class="mr-pill-cyan w-full sm:w-auto">
                                <span>Buka Dashboard</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="mr-pill-cyan w-full sm:w-auto">
                                <span>Register Akun</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/></svg>
                            </a>
                            <a href="#langkah" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 rounded-full bg-white/10 hover:bg-white/20 text-white border border-white/25 text-xs font-extrabold uppercase tracking-wider transition-all">
                                8 Langkah Penggunaan
                            </a>
                        @endauth
                    </div>

                    {{-- 4 Feature Highlights Row (Directly matching the reference image's 4 horizontal items) --}}
                    <div class="mr-hero-features">
                        <div class="mr-hero-feature-item">
                            <div class="mr-hero-feature-icon">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <span class="text-xs font-semibold leading-tight text-blue-50">Cybercounseling<br>Berfokus Solusi</span>
                        </div>
                        <div class="mr-hero-feature-item">
                            <div class="mr-hero-feature-icon">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/></svg>
                            </div>
                            <span class="text-xs font-semibold leading-tight text-blue-50">Modul Self-Help<br>Interaktif</span>
                        </div>
                        <div class="mr-hero-feature-item">
                            <div class="mr-hero-feature-icon">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <span class="text-xs font-semibold leading-tight text-blue-50">Instrumen<br>Resiliensi</span>
                        </div>
                        <div class="mr-hero-feature-item">
                            <div class="mr-hero-feature-icon">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <span class="text-xs font-semibold leading-tight text-blue-50">Pendampingan<br>Konselor</span>
                        </div>
                    </div>
                </div>

                {{-- Right Column: Glowing Cyan Portal Ring + 3D Character + Orbiting Icon Bubbles --}}
                <div>
                    <div class="mr-portal-stage">
                        {{-- Glowing Double Cyan Rings (10% Cyan Accent) --}}
                        <div class="mr-cyan-ring-outer"></div>
                        <div class="mr-cyan-ring-inner"></div>

                        {{-- 3D Character Illustration inside Portal --}}
                        <div class="mr-portal-avatar">
                            <img src="{{ asset('image/hero-counseling.jpg') }}" alt="Remaja Tangguh MY RESILIENCE">
                        </div>

                        {{-- Orbiting 3D Icon Bubbles positioned strictly on the outer perimeter so they never cover the character --}}
                        {{-- Top-Right Large Cyan Chart/Message Bubble --}}
                        <div class="mr-orbit-bubble mr-bubble-cyan w-12 h-12 sm:w-14 sm:h-14 -top-2 -right-2">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"/></svg>
                        </div>

                        {{-- Top-Left White Mail/Counseling Bubble --}}
                        <div class="mr-orbit-bubble mr-bubble-white w-10 h-10 sm:w-12 sm:h-12 top-2 -left-2">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>

                        {{-- Top Center Small Blue Lightning Bubble --}}
                        <div class="mr-orbit-bubble mr-bubble-blue w-9 h-9 sm:w-10 sm:h-10 -top-4 sm:-top-5 left-[42%]">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>

                        {{-- Mid-Left Cyan Heart/Resilience Bubble --}}
                        <div class="mr-orbit-bubble mr-bubble-cyan w-9 h-9 sm:w-10 sm:h-10 top-[42%] -left-3 sm:-left-6">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                        </div>

                        {{-- Bottom-Left Blue Self-Help Bubble --}}
                        <div class="mr-orbit-bubble mr-bubble-blue w-11 h-11 sm:w-14 sm:h-14 bottom-2 -left-2 sm:-left-3.5">
                            <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>

                        {{-- Mid-Right Blue Microphone/Voice Counseling Bubble --}}
                        <div class="mr-orbit-bubble mr-bubble-blue w-10 h-10 sm:w-12 sm:h-12 top-[46%] -right-3 sm:-right-6">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/></svg>
                        </div>

                        {{-- Bottom-Center Blue Solution Shield Bubble --}}
                        <div class="mr-orbit-bubble mr-bubble-blue w-10 h-10 sm:w-12 sm:h-12 -bottom-4 sm:-bottom-6 left-[43%]">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        </div>

                        {{-- Bottom-Right Cyan Counselor Bubble --}}
                        <div class="mr-orbit-bubble mr-bubble-cyan w-10 h-10 sm:w-12 sm:h-12 bottom-2.5 -right-2">
                            <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @php
            $stepsList = [
                'Silakan register akun',
                'Masuk melalui menu log-in',
                'Memilih konselor',
                'Mengisi instrumen resiliensi sebelum mengikuti sesi self-help',
                'Melakukan sesi self-help',
                'Mengisi instrumen resiliensi setelah mengikuti sesi self-help',
                'Mengkomunikasikan hasil self-help dengan konselor',
                'Menghubungi konselor sekolah jika dibutuhkan sesi lanjutan konseling'
            ];
        @endphp

        {{-- ==================================================================
             LOWER SHOWCASE SECTION (60% White Base + Left Welcome Card + Right Royal Blue Card)
             ================================================================== --}}
        <section id="sambutan" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">
            <div class="mr-showcase-grid">

                {{-- Left Side: First Half of Welcome Text on Crisp White Card --}}
                <div class="mr-welcome-card">
                    <div class="space-y-4">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-cyan-50 border border-cyan-200 text-cyan-700 text-xs font-extrabold uppercase tracking-wider">
                            <span class="w-2 h-2 rounded-full bg-cyan-500"></span>
                            Tentang Platform MY RESILIENCE
                        </div>

                        <h2 class="text-xl sm:text-2xl font-extrabold text-slate-900 leading-snug">
                            SELAMAT DATANG DI LAMAN <span class="text-blue-700">MY RESILIENCE!</span>
                        </h2>

                        <p class="text-sm sm:text-base text-slate-700 leading-relaxed font-medium">
                            Halo! Selamat datang di <strong class="text-blue-800 font-bold">MY RESILIENCE</strong>—ruang aman yang dirancang khusus untuk mendampingimu tumbuh menjadi pribadi yang lebih tangguh.
                        </p>

                        <p class="text-sm sm:text-base text-slate-600 leading-relaxed">
                            Laman ini merupakan platform bantuan berbasis cybercounseling berfokus solusi (<em>Solution-Focused Brief Counseling</em>) yang dilengkapi dengan modul self-help interaktif. Di sini, kamu tidak diajak untuk terus berfokus pada masalah atau kegagalan masa lalu, melainkan diajak untuk menemukan kekuatan diri, menemukan jalan keluar, dan melangkah menuju masa depan yang kamu harapkan.
                        </p>
                    </div>

                    <div class="pt-5 mt-6 border-t border-slate-100 flex flex-wrap items-center justify-between gap-3">
                        <div class="flex items-center gap-2 text-xs font-bold text-slate-500">
                            <span class="w-2 h-2 rounded-full bg-blue-700"></span>
                            <span>SFBC • Modul Self-Help Interaktif</span>
                        </div>
                        <a href="#langkah" class="text-xs font-extrabold uppercase tracking-wider text-blue-800 hover:text-cyan-600 transition-colors">
                            Lihat Alur Layanan &rarr;
                        </a>
                    </div>
                </div>

                {{-- Right Side: Second Half of Welcome Text + Special Quote Highlight inside Royal Blue Card --}}
                <div class="mr-blue-panel">
                    {{-- Cyan Wavy Blobs at Top-Right --}}
                    <div class="mr-blue-panel-blob-1"></div>
                    <div class="mr-blue-panel-blob-2"></div>

                    <div class="relative z-10 space-y-5">
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white/10 border border-cyan-300/40 text-cyan-300 text-[11px] font-bold uppercase tracking-widest">
                            <span class="w-2 h-2 rounded-full bg-cyan-300"></span>
                            Eksplorasi Potensi & Solusi
                        </div>

                        <p class="text-sm sm:text-base text-blue-50 leading-relaxed font-medium">
                            Setiap tantangan yang kamu hadapi hari ini adalah bagian dari proses belajar. Mari bersama-sama mengeksplorasi potensi dan solusi terbaik yang ada di dalam dirimu melalui berbagai fitur dan panduan interaktif yang telah kami sediakan.
                        </p>

                        {{-- Special Quote / Callout Box with Quotation Marks & Cyan Accent --}}
                        <div class="relative p-4 sm:p-5 rounded-2xl border-l-4 border-cyan-400" style="background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(8px); border-top: 1px solid rgba(103, 232, 249, 0.3); border-right: 1px solid rgba(103, 232, 249, 0.3); border-bottom: 1px solid rgba(103, 232, 249, 0.3);">
                            <div class="flex items-start gap-3 sm:gap-3.5">
                                <div class="w-8 h-8 sm:w-9 sm:h-9 rounded-xl bg-cyan-400 text-slate-900 flex items-center justify-center flex-shrink-0 shadow-md font-black text-lg leading-none">
                                    &ldquo;
                                </div>
                                <div>
                                    <p class="text-sm sm:text-lg font-extrabold text-white italic leading-snug">
                                        &ldquo;Selamat bertumbuh dan menemukan kembali ketangguhan dirimu!&rdquo;
                                    </p>
                                    <span class="inline-block mt-1.5 text-[11px] font-bold uppercase tracking-widest text-cyan-300">
                                        &mdash; Tim MY RESILIENCE
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative z-10 pt-5 mt-6 border-t border-white/15 flex flex-col sm:flex-row sm:items-center justify-between gap-3 sm:gap-4">
                        <span class="text-xs font-bold text-blue-200">Siap memulai langkah pertamamu?</span>
                        @auth
                            <a href="{{ route('dashboard') }}" class="mr-pill-cyan w-full sm:w-auto" style="padding: 0.6rem 1.5rem; font-size: 0.78rem;">
                                Buka Dashboard
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="mr-pill-cyan w-full sm:w-auto" style="padding: 0.6rem 1.5rem; font-size: 0.78rem;">
                                Mulai Sekarang
                            </a>
                        @endauth
                    </div>
                </div>

            </div>
        </section>

        {{-- ==================================================================
             COMPLETE 8 STEPS LIST SECTION (60% White Base + Blue/Cyan Accents)
             ================================================================== --}}
        <section id="langkah" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20 border-t border-slate-100">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 sm:mb-10 gap-3 sm:gap-6">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-cyan-600 block mb-1.5">Alur Lengkap Layanan</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">8 Langkah Penggunaan MY RESILIENCE</h2>
                </div>
                <p class="text-xs sm:text-sm text-slate-500 max-w-md leading-relaxed">
                    Ikuti tahapan berurutan berikut mulai dari pendaftaran akun hingga komunikasi hasil self-help bersama konselor.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-5">
                @foreach($stepsList as $idx => $stepText)
                    <div class="mr-step-item">
                        <div class="mr-step-badge">
                            {{ $idx + 1 }}
                        </div>
                        <div>
                            <span class="text-[11px] font-bold uppercase tracking-wider text-cyan-600 block">
                                Langkah {{ $idx + 1 }}
                            </span>
                            <p class="text-sm font-bold text-slate-800 leading-snug mt-1">
                                {{ $stepText }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ==================================================================
             TENTANG PENGEMBANG (Designed like "Featured Course" Cards in Reference Image!)
             ================================================================== --}}
        <section id="pengembang" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20 border-t border-slate-100">
            <div class="flex flex-col sm:flex-row sm:items-end justify-between mb-8 sm:mb-10 gap-3 sm:gap-6">
                <div>
                    <span class="text-xs font-extrabold uppercase tracking-wider text-cyan-600 block mb-1.5">Tim Peneliti & Pengembang</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900">Tentang Pengembang</h2>
                </div>
                <p class="text-xs sm:text-sm text-slate-500 max-w-md leading-relaxed">
                    Departemen Bimbingan dan Konseling Fakultas Ilmu Pendidikan Universitas Negeri Malang.
                </p>
            </div>

            @php
                $team = [
                    ['name' => 'Prof. Dr. M. Ramli, M.A', 'role' => 'Departemen Bimbingan dan Konseling FIP UM', 'initials' => 'MR', 'photo' => 'image/team/ramli.png'],
                    ['name' => 'Prof. Dr. Nur Hidayah, M.Pd', 'role' => 'Departemen Bimbingan dan Konseling FIP UM', 'initials' => 'NH', 'photo' => 'image/team/nur-hidayah.png'],
                    ['name' => 'Dr. Nur Eva, M.Psi., Psikolog', 'role' => 'Fakultas Psikologi Universitas Negeri Malang', 'initials' => 'NE', 'photo' => 'image/team/nur-eva.png'],
                    ['name' => 'Dr. Nur Mega Aris Saputra, S.Pd., M.Pd', 'role' => 'Departemen Bimbingan dan Konseling FIP UM', 'initials' => 'AS', 'photo' => 'image/team/aris-saputra.png'],
                    ['name' => 'Muh Khoiruddin Jalil, S.Pd., M.Pd', 'role' => 'Departemen Bimbingan dan Konseling FIP UM', 'initials' => 'MJ', 'photo' => 'image/team/khoiruddin-jalil.png'],
                    ['name' => 'Muh. Nur Alamsyah, S.Pd., M.Pd', 'role' => 'Departemen Bimbingan dan Konseling FIP UM', 'initials' => 'MA', 'photo' => 'image/team/alamsyah.png'],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 sm:gap-6">
                @foreach($team as $member)
                    <div class="mr-feature-card">
                        <div>
                            {{-- Royal Blue / Cyan Framed Portrait Box (like Featured Course cards in reference image) --}}
                            <div class="mr-card-portrait">
                                {{-- Decorative Cyan Ring inside Portrait Box --}}
                                <div class="w-24 h-24 rounded-full border-2 border-cyan-300/70 bg-white/10 backdrop-blur-sm flex flex-col items-center justify-center text-white shadow-lg overflow-hidden">
                                    @if(isset($member['photo']) && file_exists(public_path($member['photo'])))
                                        <img src="{{ asset($member['photo']) }}" alt="{{ $member['name'] }}" class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-9 h-9 text-cyan-200 mb-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.75" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <span class="text-xs font-extrabold tracking-widest text-white">{{ $member['initials'] }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Card Text --}}
                            <div class="px-1.5 pt-1">
                                <h3 class="text-base font-extrabold text-slate-900 leading-snug">
                                    {{ $member['name'] }}
                                </h3>
                                <p class="text-xs text-slate-500 mt-1.5 leading-relaxed">
                                    {{ $member['role'] }}
                                </p>
                            </div>
                        </div>

                        {{-- Bottom Row with Pill Badge & Star/Cyan Accent --}}
                        <div class="px-1.5 pt-4 mt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="mr-card-pill-btn">Tim Pengembang</span>
                            <div class="flex items-center gap-1 text-cyan-500">
                                <span class="w-2 h-2 rounded-full bg-cyan-400"></span>
                                <span class="w-2 h-2 rounded-full bg-blue-600"></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- ==================================================================
             FOOTER & KONTAK (30% Royal Blue + 10% Cyan Accent + 60% White Card)
             ================================================================== --}}
        <footer id="kontak" class="bg-slate-50 border-t border-slate-200/80 py-12 sm:py-16 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center pb-10 border-b border-slate-200">
                    {{-- Left: Brand & Institution Info --}}
                    <div class="lg:col-span-6 space-y-4">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('image/logo-mark.png') }}" alt="MY RESILIENCE" class="w-11 h-11 rounded-xl object-cover border-2 border-blue-200 shadow-sm flex-shrink-0">
                            <div>
                                <span class="text-lg font-extrabold tracking-wider text-blue-900 block leading-none">MY RESILIENCE</span>
                                <span class="text-[10px] font-bold text-cyan-600 tracking-widest uppercase block mt-1">KEMENDIKTI SAINTEK • UNIVERSITAS NEGERI MALANG</span>
                            </div>
                        </div>
                        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed max-w-lg">
                            Model Cybercounseling Berfokus Solusi Berbantuan Self-Help untuk Meningkatkan Resiliensi pada Remaja dengan Kerentanan Psikologis.
                        </p>
                    </div>

                    {{-- Right: Contact Info Card --}}
                    <div class="lg:col-span-6">
                        <div class="bg-white rounded-3xl border border-slate-200 p-5 sm:p-7 shadow-sm flex flex-col sm:flex-row sm:items-center justify-between gap-5 sm:gap-6">
                            <div class="space-y-3 text-sm min-w-0">
                                <div>
                                    <p class="text-xs font-extrabold uppercase tracking-wider text-cyan-600">Alamat</p>
                                    <p class="font-bold text-slate-800 mt-0.5">Departemen Bimbingan dan Konseling FIP UM</p>
                                    <p class="text-slate-600 text-xs">Jl. Semarang No 5 Kota Malang</p>
                                </div>
                                <div class="flex flex-wrap gap-4 sm:gap-6 pt-1">
                                    <div>
                                        <p class="text-xs font-extrabold uppercase tracking-wider text-cyan-600">Kontak</p>
                                        <a href="https://wa.me/6281231750634" target="_blank" class="font-bold text-blue-800 hover:text-cyan-600 text-sm">+62812-3175-0634</a>
                                    </div>
                                    <div class="min-w-0">
                                        <p class="text-xs font-extrabold uppercase tracking-wider text-cyan-600">Email</p>
                                        <a href="mailto:aris.saputra.fip@um.ac.id" class="font-bold text-blue-800 hover:text-cyan-600 text-sm break-all">aris.saputra.fip@um.ac.id</a>
                                    </div>
                                </div>
                            </div>

                            <div class="flex-shrink-0">
                                <a href="https://wa.me/6281231750634" target="_blank" class="mr-pill-cyan w-full sm:w-auto">
                                    Hubungi Kami
                                </a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="pt-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-500 font-medium text-center sm:text-left">
                    <p>&copy; {{ date('Y') }} <strong class="text-slate-800">MY RESILIENCE</strong> — Departemen Bimbingan dan Konseling FIP UM.</p>
                    <div class="flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-white border border-slate-300" title="60% White"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-blue-800" title="30% Primary Royal Blue"></span>
                        <span class="w-2.5 h-2.5 rounded-full bg-cyan-400" title="10% Accent Cyan"></span>
                        <span class="ml-1 font-bold text-blue-800">KEMENDIKTI SAINTEK • UM</span>
                    </div>
                </div>
            </div>
        </footer>

    </div>
</div>

@push('scripts')
<script>
    function toggleLandingMobileMenu() {
        const menu = document.getElementById('mr-mobile-nav');
        const openIcon = document.getElementById('mr-menu-icon-open');
        const closeIcon = document.getElementById('mr-menu-icon-close');
        if (!menu) return;
        menu.classList.toggle('hidden');
        if (openIcon && closeIcon) {
            openIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');
        }
    }
</script>
@endpush
@endsection
