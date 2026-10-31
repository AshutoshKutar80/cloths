<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="theme-color" content="#f8f5f0">
    <title>VÉLORA — Wear Your Story</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&family=Italiana&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --bg: #f8f5f0;
            --surface: #fffdfa;
            --surface2: #eee7e0;
            --text: #251d20;
            --muted: #786d70;
            --accent: #8c2945;
            --accent2: #d5ac8e;
            --line: #e4d9d6;
            --glass: rgba(248, 245, 240, .91);
            --invert: #fff;
            --shadow: 0 25px 75px rgba(50, 24, 32, .12)
        }

        html[data-theme=dark] {
            --bg: #131014;
            --surface: #201a20;
            --surface2: #2d232a;
            --text: #f8f0ed;
            --muted: #c1aeb4;
            --accent: #e5a5b5;
            --accent2: #b98168;
            --line: #46363e;
            --glass: rgba(19, 16, 20, .92);
            --invert: #25131d;
            --shadow: 0 25px 75px rgba(0, 0, 0, .35)
        }

        * {
            box-sizing: border-box
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 90px
        }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--text);
            font-family: 'DM Sans', sans-serif;
            overflow-x: hidden;
            transition: background .4s, color .4s
        }

        body.lock {
            overflow: hidden
        }

        button,
        input {
            font: inherit
        }

        button {
            cursor: pointer
        }

        a {
            text-decoration: none;
            color: inherit
        }

        img {
            display: block;
            width: 100%;
            object-fit: cover
        }

        h1,
        h2,
        h3,
        p {
            margin-top: 0
        }

        h1,
        h2,
        h3,
        .serif {
            font-family: Italiana, Georgia, serif;
            font-weight: 400
        }

        .wrap {
            width: min(1350px, calc(100% - 70px));
            margin: auto
        }

        .section {
            padding: 105px 0
        }

        .eyebrow {
            font: 800 10px Manrope, sans-serif;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: var(--accent)
        }

        .heading {
            font-size: clamp(45px, 6vw, 92px);
            line-height: 1;
            letter-spacing: -1.5px;
            margin: 18px 0
        }

        .muted {
            color: var(--muted);
            line-height: 1.85
        }

        .btn {
            border: 1px solid var(--accent);
            background: var(--accent);
            color: var(--invert);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 17px;
            min-height: 51px;
            padding: 14px 25px;
            font: 800 10px Manrope, sans-serif;
            letter-spacing: 1.4px;
            text-transform: uppercase;
            transition: transform .3s, background .3s, color .3s, box-shadow .3s
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 14px 30px rgba(120, 45, 66, .2)
        }

        .btn.ghost {
            background: transparent;
            color: var(--text);
            border-color: var(--line)
        }

        .btn.ghost:hover {
            border-color: var(--accent);
            color: var(--accent)
        }

        .btn:disabled {
            opacity: .5;
            cursor: not-allowed;
            transform: none
        }

        .reveal {
            opacity: 0;
            transform: translateY(32px);
            transition: opacity .8s, transform .8s
        }

        .reveal.show {
            opacity: 1;
            transform: none
        }

        .header {
            position: fixed;
            z-index: 100;
            top: 0;
            left: 0;
            right: 0;
            background: var(--glass);
            backdrop-filter: blur(22px);
            border-bottom: 1px solid var(--line)
        }

        .header.scrolled {
            box-shadow: var(--shadow)
        }

        .header-inner {
            height: 78px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px
        }

        .brand {
            font: 400 37px Italiana, serif;
            letter-spacing: 4px;
            white-space: nowrap
        }

        .nav-links {
            display: flex;
            gap: 29px;
            align-items: center
        }

        .nav-links a {
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1px;
            text-transform: uppercase
        }

        .nav-links a:hover {
            color: var(--accent)
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 8px
        }

        .icon-btn {
            width: 42px;
            height: 42px;
            display: grid;
            place-items: center;
            background: transparent;
            color: var(--text);
            border: 1px solid var(--line);
            font-size: 19px;
            position: relative;
            transition: .25s
        }

        .icon-btn:hover {
            background: var(--surface2)
        }

        .count {
            position: absolute;
            top: -7px;
            right: -7px;
            background: var(--accent);
            color: var(--invert);
            font: 700 10px Manrope, sans-serif;
            min-width: 19px;
            height: 19px;
            border-radius: 50%;
            display: grid;
            place-items: center;
            padding: 2px
        }

        .mobile-trigger {
            display: none
        }

        .mobile-menu {
            position: fixed;
            z-index: 99;
            top: 78px;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--bg);
            padding: 32px;
            transform: translateX(100%);
            visibility: hidden;
            transition: transform .4s, visibility .4s;
            display: flex;
            flex-direction: column;
            overflow: auto
        }

        .mobile-menu.open {
            transform: none;
            visibility: visible
        }

        .mobile-menu a {
            font: 42px Italiana, serif;
            padding: 16px 0;
            border-bottom: 1px solid var(--line)
        }

        .progress {
            height: 2px;
            background: var(--accent);
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 0
        }

        .hero {
            padding-top: 78px;
            min-height: 800px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            overflow: hidden
        }

        .hero-left {
            padding: 120px 40px 100px max(35px, calc((100vw - 1350px)/2));
            display: flex;
            flex-direction: column;
            justify-content: center
        }

        .hero h1 {
            font-size: clamp(70px, 9vw, 145px);
            line-height: .84;
            letter-spacing: -4px;
            margin: 30px 0
        }

        .hero h1 em {
            color: var(--accent)
        }

        .hero p {
            max-width: 440px;
            line-height: 1.9;
            color: var(--muted);
            font-size: 14px;
            margin: 20px 0 35px
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px
        }

        .hero-bottom {
            display: flex;
            align-items: center;
            gap: 25px;
            margin-top: 65px;
            font: 700 10px Manrope, sans-serif;
            letter-spacing: 1.5px;
            color: var(--muted)
        }

        .hero-bottom .line {
            width: 60px;
            height: 1px;
            background: var(--accent)
        }

        .hero-right {
            position: relative;
            min-height: 720px;
            overflow: hidden;
            background: #a58b7c
        }

        .hero-right img {
            height: 100%;
            object-position: center 30%;
            animation: heroZoom 13s ease-in-out infinite alternate
        }

        .hero-right:after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(0deg, rgba(0, 0, 0, .25), transparent 35%)
        }

        .hero-vertical {
            position: absolute;
            z-index: 1;
            right: 28px;
            top: 50%;
            writing-mode: vertical-rl;
            transform: translateY(-50%);
            color: white;
            letter-spacing: 4px;
            font-size: 11px
        }

        .hero-counter {
            position: absolute;
            bottom: 35px;
            left: 35px;
            z-index: 1;
            color: white;
            font: 34px Italiana, serif
        }

        .hero-counter span {
            font: 12px Manrope, sans-serif;
            opacity: .75
        }

        @keyframes heroZoom {
            to {
                transform: scale(1.1)
            }
        }

        .marquee {
            background: var(--text);
            color: var(--bg);
            overflow: hidden;
            padding: 18px 0
        }

        .marquee-inner {
            display: flex;
            width: max-content;
            gap: 55px;
            animation: marquee 30s linear infinite
        }

        .marquee-inner span {
            white-space: nowrap;
            font: 25px Italiana, serif
        }

        .marquee-inner b {
            color: var(--accent2)
        }

        @keyframes marquee {
            to {
                transform: translateX(-50%)
            }
        }

        .intro {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: end;
            gap: 50px
        }

        .intro p {
            max-width: 510px;
            margin-left: auto
        }

        .collection-grid {
            display: grid;
            grid-template-columns: 1.15fr .85fr;
            gap: 22px;
            margin-top: 45px
        }

        .collection-card {
            position: relative;
            overflow: hidden;
            background: var(--surface2);
            min-height: 510px
        }

        .collection-card:nth-child(2) {
            margin-top: 85px
        }

        .collection-card img {
            height: 100%;
            position: absolute;
            inset: 0;
            transition: transform .9s
        }

        .collection-card:hover img {
            transform: scale(1.09)
        }

        .collection-card:after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(0deg, rgba(0, 0, 0, .62), transparent 65%)
        }

        .collection-content {
            position: absolute;
            z-index: 1;
            bottom: 35px;
            left: 35px;
            color: white
        }

        .collection-content span {
            font: 800 10px Manrope, sans-serif;
            letter-spacing: 3px
        }

        .collection-content h3 {
            font-size: 58px;
            margin: 10px 0
        }

        .collection-content a {
            display: inline-block;
            font-size: 11px;
            letter-spacing: 2px;
            border-bottom: 1px solid white;
            padding-bottom: 8px
        }

        .section-top {
            display: flex;
            justify-content: space-between;
            align-items: end;
            gap: 20px;
            margin-bottom: 30px
        }

        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 25px 0 35px
        }

        .filter {
            background: transparent;
            border: 1px solid var(--line);
            color: var(--text);
            padding: 11px 20px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            transition: .3s
        }

        .filter.active,
        .filter:hover {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--invert)
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(4, minmax(0, 1fr));
            gap: 25px
        }

        .product {
            min-width: 0
        }

        .product-image {
            height: 370px;
            overflow: hidden;
            position: relative;
            background: var(--surface2)
        }

        .product-image>img {
            height: 100%;
            transition: transform .8s
        }

        .product:hover .product-image>img {
            transform: scale(1.08)
        }

        .product-tag {
            position: absolute;
            left: 12px;
            top: 12px;
            background: var(--surface);
            padding: 8px 11px;
            color: var(--accent);
            font-size: 9px;
            letter-spacing: 1px;
            font-weight: 800
        }

        .wish {
            position: absolute;
            right: 12px;
            top: 12px;
            width: 38px;
            height: 38px;
            border: 0;
            background: var(--surface);
            color: var(--text);
            font-size: 22px
        }

        .wish.active {
            color: var(--accent)
        }

        .product-actions {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1px;
            background: var(--line);
            transform: translateY(100%);
            transition: transform .3s
        }

        .product:hover .product-actions,
        .product:focus-within .product-actions {
            transform: none
        }

        .product-actions button {
            border: 0;
            min-height: 48px;
            background: var(--surface);
            color: var(--text);
            font: 800 10px Manrope, sans-serif;
            letter-spacing: .5px
        }

        .product-actions button:last-child {
            background: var(--accent);
            color: var(--invert)
        }

        .product-info {
            padding: 18px 0
        }

        .product-info small {
            font-size: 10px;
            color: var(--muted);
            letter-spacing: 1.5px;
            text-transform: uppercase
        }

        .product-info h3 {
            font-size: 26px;
            margin: 8px 0
        }

        .product-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 13px;
            font-weight: 700;
            gap: 6px
        }

        .old {
            text-decoration: line-through;
            color: var(--muted);
            font-size: 11px;
            margin-left: 6px
        }

        .swatches {
            display: flex;
            gap: 5px
        }

        .swatches span {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 1px solid var(--line)
        }

        .load-area {
            text-align: center;
            margin-top: 45px
        }

        .editorial {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 620px;
            background: var(--surface2)
        }

        .editorial-image {
            overflow: hidden
        }

        .editorial-image img {
            height: 100%;
            min-height: 600px
        }

        .editorial-copy {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: clamp(40px, 8vw, 120px)
        }

        .editorial-copy h2 {
            font-size: clamp(60px, 7vw, 110px);
            line-height: .9;
            margin: 20px 0
        }

        .editorial-copy p {
            max-width: 440px;
            line-height: 2;
            color: var(--muted);
            font-size: 14px;
            margin: 20px 0 35px
        }

        .editorial-copy .btn {
            align-self: flex-start
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 45px
        }

        .value {
            padding: 45px 32px;
            border: 1px solid var(--line);
            background: var(--surface);
            transition: .3s
        }

        .value:hover {
            transform: translateY(-8px);
            border-color: var(--accent)
        }

        .value-icon {
            font-size: 34px;
            color: var(--accent)
        }

        .value h3 {
            font-size: 35px;
            margin: 25px 0 12px
        }

        .value p {
            font-size: 13px;
            color: var(--muted);
            line-height: 1.9
        }

        .lookbook {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-top: 45px
        }

        .lookbook figure {
            margin: 0;
            overflow: hidden;
            position: relative;
            height: 500px
        }

        .lookbook figure:nth-child(2) {
            margin-top: 70px
        }

        .lookbook img {
            height: 100%;
            transition: transform .8s
        }

        .lookbook figure:hover img {
            transform: scale(1.08)
        }

        .lookbook figcaption {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 60px 22px 22px;
            background: linear-gradient(transparent, rgba(0, 0, 0, .6));
            color: white;
            font: 30px Italiana, serif
        }

        .testimonial {
            background: var(--accent);
            color: var(--invert);
            text-align: center;
            padding: 115px 25px
        }

        .testimonial blockquote {
            font: clamp(32px, 4.5vw, 65px) Italiana, serif;
            line-height: 1.25;
            max-width: 970px;
            margin: 30px auto
        }

        .testimonial small {
            font-size: 10px;
            letter-spacing: 3px
        }

        .newsletter {
            padding: 95px 0;
            background: var(--surface2)
        }

        .newsletter-inner {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 60px
        }

        .newsletter h2 {
            font-size: clamp(48px, 5vw, 80px);
            line-height: 1;
            margin: 12px 0
        }

        .newsletter form {
            display: flex;
            border-bottom: 1px solid var(--text);
            padding: 10px 0
        }

        .newsletter input {
            flex: 1;
            min-width: 0;
            border: 0;
            outline: 0;
            background: transparent;
            color: var(--text);
            padding: 12px;
            font-size: 13px
        }

        .newsletter button {
            border: 0;
            background: transparent;
            color: var(--accent);
            font-size: 24px;
            padding: 8px 15px
        }

        .footer {
            background: var(--text);
            color: var(--bg);
            padding: 80px 0 25px
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.2fr;
            gap: 35px
        }

        .footer .brand {
            font-size: 49px
        }

        .footer p {
            font-size: 13px;
            line-height: 1.9;
            opacity: .7;
            max-width: 310px
        }

        .footer h4 {
            font-size: 11px;
            letter-spacing: 2px;
            text-transform: uppercase
        }

        .footer-links {
            display: grid;
            gap: 13px
        }

        .footer-links a {
            font-size: 12px;
            opacity: .7
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, .2);
            padding-top: 24px;
            margin-top: 70px;
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            opacity: .7
        }

        .overlay {
            position: fixed;
            inset: 0;
            z-index: 150;
            background: rgba(0, 0, 0, .6);
            opacity: 0;
            visibility: hidden;
            transition: .3s
        }

        .overlay.open {
            opacity: 1;
            visibility: visible
        }

        .drawer {
            position: fixed;
            z-index: 151;
            right: 0;
            top: 0;
            bottom: 0;
            width: min(460px, 100%);
            background: var(--surface);
            transform: translateX(100%);
            visibility: hidden;
            transition: transform .4s, visibility .4s;
            display: flex;
            flex-direction: column
        }

        .drawer.open {
            transform: none;
            visibility: visible
        }

        .drawer-head {
            padding: 25px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 1px solid var(--line)
        }

        .drawer-head h2 {
            font-size: 40px;
            margin: 0
        }

        .drawer-items {
            flex: 1;
            overflow-y: auto;
            padding: 15px 25px
        }

        .cart-item {
            display: flex;
            gap: 15px;
            border-bottom: 1px solid var(--line);
            padding: 20px 0
        }

        .cart-item img {
            width: 88px;
            height: 105px;
            flex-shrink: 0
        }

        .cart-item h3 {
            font-size: 23px;
            margin: 0 0 8px
        }

        .cart-item p {
            font-size: 12px;
            color: var(--muted)
        }

        .qty {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 12px
        }

        .qty button {
            border: 1px solid var(--line);
            background: transparent;
            color: var(--text);
            width: 30px;
            height: 30px
        }

        .drawer-foot {
            border-top: 1px solid var(--line);
            padding: 25px
        }

        .total-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 17px;
            font-size: 16px;
            font-weight: 700
        }

        .drawer-foot .btn {
            width: 100%
        }

        .drawer-foot p {
            font-size: 11px;
            color: var(--muted);
            line-height: 1.6
        }

        .empty {
            text-align: center;
            padding: 65px 10px;
            color: var(--muted);
            line-height: 2
        }

        .toast {
            position: fixed;
            z-index: 300;
            bottom: 28px;
            left: 50%;
            transform: translate(-50%, 25px);
            opacity: 0;
            pointer-events: none;
            max-width: calc(100% - 30px);
            padding: 16px 24px;
            background: var(--text);
            color: var(--bg);
            font-size: 12px;
            transition: .3s;
            text-align: center
        }

        .toast.show {
            opacity: 1;
            transform: translate(-50%, 0)
        }

        .back-top {
            position: fixed;
            right: 20px;
            bottom: 20px;
            z-index: 90;
            background: var(--accent);
            color: var(--invert);
            border: 0;
            width: 46px;
            height: 46px;
            font-size: 20px;
            opacity: 0;
            transform: translateY(15px);
            pointer-events: none;
            transition: .3s
        }

        .back-top.show {
            opacity: 1;
            transform: none;
            pointer-events: auto
        }

        .product-modal {
            position: fixed;
            inset: 0;
            z-index: 210;
            display: grid;
            place-items: center;
            padding: 20px;
            background: rgba(15, 10, 15, .76);
            backdrop-filter: blur(12px);
            opacity: 0;
            visibility: hidden;
            transition: .3s
        }

        .product-modal.open {
            opacity: 1;
            visibility: visible
        }

        .product-modal-box {
            position: relative;
            width: min(1050px, 100%);
            max-height: 92dvh;
            overflow-y: auto;
            background: var(--surface);
            color: var(--text);
            box-shadow: 0 35px 100px rgba(0, 0, 0, .25);
            transform: translateY(30px) scale(.98);
            transition: transform .4s
        }

        .product-modal.open .product-modal-box {
            transform: none
        }

        .modal-close {
            position: sticky;
            float: right;
            right: 15px;
            top: 15px;
            z-index: 5;
            margin: 15px 15px -60px 0;
            width: 42px;
            height: 42px;
            border: 1px solid var(--line);
            background: var(--surface);
            color: var(--text);
            font-size: 23px
        }

        .modal-layout {
            display: grid;
            grid-template-columns: 1fr 1fr
        }

        .modal-gallery {
            padding: 22px;
            background: var(--surface2);
            min-width: 0
        }

        .modal-main-image {
            width: 100%;
            height: 480px;
            object-fit: cover;
            background: var(--line)
        }

        .modal-thumbnails {
            display: flex;
            gap: 10px;
            overflow-x: auto;
            margin-top: 12px;
            padding-bottom: 5px
        }

        .modal-thumbnails button {
            flex: 0 0 76px;
            height: 90px;
            padding: 0;
            border: 2px solid transparent;
            background: transparent
        }

        .modal-thumbnails button.active {
            border-color: var(--accent)
        }

        .modal-thumbnails img {
            height: 100%
        }

        .modal-details {
            padding: 45px 38px
        }

        .modal-details h2 {
            font-size: clamp(40px, 4vw, 65px);
            line-height: 1.05;
            margin: 15px 0
        }

        .modal-price {
            font-size: 23px;
            font-weight: 800;
            margin: 20px 0
        }

        .modal-price del {
            color: var(--muted);
            font-size: 15px;
            font-weight: 400;
            margin-left: 10px
        }

        .modal-description {
            color: var(--muted);
            font-size: 13px;
            line-height: 1.9
        }

        .modal-divider {
            height: 1px;
            background: var(--line);
            margin: 25px 0
        }

        .option-title {
            display: flex;
            justify-content: space-between;
            margin-bottom: 12px;
            font-size: 12px;
            font-weight: 800;
            gap: 12px
        }

        .option-title span {
            color: var(--muted);
            font-weight: 500
        }

        .size-options,
        .color-options {
            display: flex;
            flex-wrap: wrap;
            gap: 9px;
            margin-bottom: 24px
        }

        .size-option {
            min-width: 48px;
            height: 46px;
            padding: 0 12px;
            border: 1px solid var(--line);
            background: transparent;
            color: var(--text);
            font-size: 12px
        }

        .size-option.active {
            background: var(--accent);
            border-color: var(--accent);
            color: var(--invert)
        }

        .color-option {
            width: 39px;
            height: 39px;
            border-radius: 50%;
            padding: 5px;
            border: 2px solid transparent;
            background: transparent
        }

        .color-option.active {
            border-color: var(--accent)
        }

        .color-option span {
            display: block;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 1px solid var(--line)
        }

        .modal-quantity {
            display: inline-flex;
            align-items: center;
            border: 1px solid var(--line);
            margin-bottom: 20px
        }

        .modal-quantity button {
            width: 46px;
            height: 45px;
            border: 0;
            background: transparent;
            color: var(--text);
            font-size: 20px
        }

        .modal-quantity strong {
            min-width: 35px;
            text-align: center
        }

        .modal-add {
            width: 100%;
            min-height: 56px
        }

        .product-specs {
            margin-top: 25px;
            border-top: 1px solid var(--line)
        }

        .product-specs p {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            border-bottom: 1px solid var(--line);
            padding: 13px 0;
            margin: 0;
            font-size: 12px
        }

        .product-specs span {
            color: var(--muted);
            text-align: right
        }

        .cart-variant {
            font-size: 11px;
            color: var(--muted);
            line-height: 1.7
        }

        .selection-error {
            color: #c63850;
            font-size: 12px;
            min-height: 20px;
            margin: 8px 0
        }

        .modal-arrows {
            display: flex;
            gap: 8px;
            margin-top: 10px
        }

        .modal-arrows button {
            flex: 1;
            padding: 10px;
            background: var(--surface);
            color: var(--text);
            border: 1px solid var(--line)
        }

        @media(max-width:1100px) {
            .nav-links {
                gap: 15px
            }

            .product-grid {
                grid-template-columns: repeat(3, 1fr)
            }

            .product-image {
                height: 330px
            }

            .footer-grid {
                grid-template-columns: 1.5fr 1fr 1fr
            }

            .footer-grid>div:last-child {
                grid-column: 2/-1
            }

            .hero h1 {
                font-size: clamp(65px, 8vw, 110px)
            }
        }

        @media(max-width:820px) {
            .wrap {
                width: calc(100% - 40px)
            }

            .nav-links {
                display: none
            }

            .mobile-trigger {
                display: grid
            }

            .hero {
                grid-template-columns: 1fr
            }

            .hero-left {
                padding: 95px 30px 70px
            }

            .hero-right {
                min-height: 560px;
                height: 560px
            }

            .hero h1 {
                font-size: clamp(75px, 13vw, 125px)
            }

            .collection-card {
                min-height: 430px
            }

            .collection-card:nth-child(2) {
                margin-top: 45px
            }

            .product-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .editorial {
                grid-template-columns: 1fr
            }

            .editorial-image img {
                min-height: 470px;
                height: 470px
            }

            .editorial-copy {
                padding: 70px 35px
            }

            .values-grid {
                grid-template-columns: 1fr 1fr
            }

            .lookbook figure {
                height: 380px
            }

            .newsletter-inner {
                grid-template-columns: 1fr;
                gap: 20px
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .footer-grid>div:last-child {
                grid-column: auto
            }

            .modal-layout {
                grid-template-columns: 1fr
            }

            .modal-main-image {
                height: 380px
            }

            .modal-details {
                padding: 28px 22px
            }
        }

        @media(max-width:540px) {
            .wrap {
                width: calc(100% - 30px)
            }

            .section {
                padding: 75px 0
            }

            .header-inner {
                height: 66px;
                gap: 6px
            }

            .brand {
                font-size: 28px;
                letter-spacing: 2px
            }

            .nav-actions {
                gap: 5px
            }

            .icon-btn {
                width: 35px;
                height: 35px;
                font-size: 16px
            }

            .mobile-menu {
                top: 66px
            }

            .mobile-menu a {
                font-size: 34px
            }

            .hero {
                padding-top: 66px
            }

            .hero-left {
                padding: 75px 22px 55px
            }

            .hero h1 {
                font-size: clamp(67px, 15vw, 94px);
                letter-spacing: -3px
            }

            .hero p {
                font-size: 13px
            }

            .hero-bottom {
                margin-top: 42px
            }

            .hero-right {
                height: 440px;
                min-height: 440px
            }

            .hero-vertical {
                right: 15px
            }

            .hero-counter {
                left: 20px
            }

            .intro {
                grid-template-columns: 1fr;
                gap: 0
            }

            .intro p {
                margin: 0
            }

            .heading {
                font-size: clamp(48px, 12vw, 68px)
            }

            .collection-grid {
                grid-template-columns: 1fr;
                gap: 16px
            }

            .collection-card {
                min-height: 400px
            }

            .collection-card:nth-child(2) {
                margin-top: 0
            }

            .collection-content {
                left: 22px;
                bottom: 25px
            }

            .collection-content h3 {
                font-size: 49px
            }

            .section-top {
                display: block
            }

            .filters {
                flex-wrap: nowrap;
                overflow-x: auto;
                scrollbar-width: none
            }

            .filter {
                flex-shrink: 0
            }

            .product-grid {
                gap: 13px
            }

            .product-image {
                height: clamp(215px, 62vw, 290px)
            }

            .product-info h3 {
                font-size: 22px
            }

            .product-tag {
                font-size: 8px
            }

            .product-actions {
                transform: none
            }

            .product-actions button {
                min-height: 42px;
                font-size: 9px;
                letter-spacing: 0
            }

            .product-info {
                padding: 12px 0
            }

            .product-bottom {
                font-size: 12px
            }

            .swatches {
                display: none
            }

            .values-grid {
                grid-template-columns: 1fr
            }

            .value {
                padding: 30px
            }

            .lookbook {
                grid-template-columns: 1fr 1fr;
                gap: 10px
            }

            .lookbook figure {
                height: 280px
            }

            .lookbook figure:nth-child(2) {
                margin-top: 0
            }

            .lookbook figure:last-child {
                grid-column: 1/-1;
                height: 330px
            }

            .lookbook figcaption {
                font-size: 24px
            }

            .testimonial {
                padding: 85px 20px
            }

            .footer-grid {
                gap: 35px 20px
            }

            .footer-grid>div:first-child {
                grid-column: 1/-1
            }

            .footer-bottom {
                flex-direction: column;
                gap: 10px
            }

            .newsletter {
                padding: 70px 0
            }

            .product-modal {
                padding: 7px
            }

            .product-modal-box {
                max-height: 97dvh
            }

            .modal-gallery {
                padding: 12px
            }

            .modal-main-image {
                height: 310px
            }

            .modal-thumbnails button {
                flex-basis: 60px;
                height: 70px
            }

            .modal-details h2 {
                font-size: 43px
            }

            .drawer-items {
                padding: 10px 16px
            }

            .drawer-foot {
                padding: 17px
            }
        }

        @media(max-width:370px) {
            .brand {
                font-size: 23px
            }

            .nav-actions {
                gap: 3px
            }

            .icon-btn {
                width: 32px;
                height: 32px
            }

            .product-grid {
                gap: 10px
            }

            .product-image {
                height: 205px
            }

            .product-info h3 {
                font-size: 19px
            }

            .product-actions button {
                font-size: 8px
            }
        }

        @media(prefers-reduced-motion:reduce) {

            *,
            *:before,
            *:after {
                animation-duration: .01ms !important;
                transition-duration: .01ms !important;
                scroll-behavior: auto !important
            }

            .reveal {
                opacity: 1;
                transform: none
            }
        }
    </style>
</head>

<body>
    <header class="header" id="header">
        <div class="wrap header-inner"><a href="#home" class="brand">VÉLORA</a>
            <nav class="nav-links" aria-label="Main navigation"><a href="#collections">Collections</a><a
                    href="#shop">Shop</a><a href="#story">Our Story</a><a href="#lookbook">Lookbook</a><a
                    href="#newsletter">Journal</a></nav>
            <div class="nav-actions"><button class="icon-btn" id="themeBtn" aria-label="Toggle theme">☾</button><button
                    class="icon-btn" id="wishBtn" aria-label="Wishlist">♡<span class="count"
                        id="wishCount">0</span></button><button class="icon-btn" id="cartBtn"
                    aria-label="Shopping bag">♧<span class="count" id="cartCount">0</span></button><button
                    class="icon-btn mobile-trigger" id="menuBtn" aria-label="Open menu"
                    aria-expanded="false">☰</button></div>
        </div>
        <div class="progress" id="progress"></div>
    </header>
    <nav class="mobile-menu" id="mobileMenu" aria-label="Mobile navigation"><a href="#home">Home</a><a
            href="#collections">Collections</a><a href="#shop">Shop</a><a href="#story">Our Story</a><a
            href="#lookbook">Lookbook</a><a href="#newsletter">Journal</a></nav>
    <main>
        <section class="hero" id="home">
            <div class="hero-left"><span class="eyebrow reveal">✦ The new season / Edition 2026</span>
                <h1 class="reveal">Wear<br>Your<br><em>Story.</em></h1>
                <p class="reveal">For every version of you. Discover modern silhouettes, beautiful textures and
                    effortless pieces that make everyday moments feel extraordinary.</p>
                <div class="hero-actions reveal"><a class="btn" href="#shop">Explore Collection ↗</a><a
                        class="btn ghost" href="#story">Discover Vélora →</a></div>
                <div class="hero-bottom"><span class="line"></span><span>THE ART OF PERSONAL
                        STYLE</span><span>✳</span></div>
            </div>
            <div class="hero-right"><img
                    src="https://images.unsplash.com/photo-1539109136881-3be0616acf4b?auto=format&fit=crop&w=1400&q=85"
                    alt="Fashion editorial model"><span class="hero-vertical">CURATED FOR THE BOLD & BEAUTIFUL</span>
                <div class="hero-counter">01 <span>/ 03 — NEW PERSPECTIVES</span></div>
            </div>
        </section>
        <div class="marquee" aria-hidden="true">
            <div class="marquee-inner"><span>STYLE WITHOUT LIMITS <b>✳</b></span><span>EVERYDAY ICONS
                    <b>✳</b></span><span>THE NEW EDIT <b>✳</b></span><span>MADE TO EXPRESS <b>✳</b></span><span>STYLE
                    WITHOUT LIMITS <b>✳</b></span><span>EVERYDAY ICONS <b>✳</b></span><span>THE NEW EDIT
                    <b>✳</b></span><span>MADE TO EXPRESS <b>✳</b></span></div>
        </div>
        <section class="section" id="collections">
            <div class="wrap">
                <div class="intro reveal">
                    <div><span class="eyebrow">01 / Curated edits</span>
                        <h2 class="heading">Find Your<br><em>Expression.</em></h2>
                    </div>
                    <p class="muted">Not just clothes. A canvas for your personality. Discover carefully curated pieces
                        for the days you want to stand out and the moments you want to feel like yourself.</p>
                </div>
                <div class="collection-grid">
                    <article class="collection-card reveal"><img
                            src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=1200&q=85"
                            alt="Women's fashion" loading="lazy">
                        <div class="collection-content"><span>THE SIGNATURE EDIT</span>
                            <h3>For Her</h3><a href="#shop" data-collection="women">DISCOVER COLLECTION ↗</a>
                        </div>
                    </article>
                    <article class="collection-card reveal"><img
                            src="https://images.unsplash.com/photo-1487222477894-8943e31ef7b2?auto=format&fit=crop&w=1100&q=85"
                            alt="Men's fashion" loading="lazy">
                        <div class="collection-content"><span>THE MODERN WARDROBE</span>
                            <h3>For Him</h3><a href="#shop" data-collection="men">DISCOVER COLLECTION ↗</a>
                        </div>
                    </article>
                </div>
            </div>
        </section>
        <section class="section" id="shop">
            <div class="wrap">
                <div class="section-top reveal">
                    <div><span class="eyebrow">02 / The selection</span>
                        <h2 class="heading">The VÉLORA Edit.</h2>
                        <p class="muted">Pieces worth wearing, styling and making your own.</p>
                    </div><span class="eyebrow" id="productSummary">24 pieces</span>
                </div>
                <div class="filters" id="filters"><button class="filter active" data-filter="all">ALL
                        PIECES</button><button class="filter" data-filter="women">WOMEN</button><button
                        class="filter" data-filter="men">MEN</button><button class="filter"
                        data-filter="outerwear">OUTERWEAR</button><button class="filter"
                        data-filter="accessories">ACCESSORIES</button></div>
                <div class="product-grid" id="productGrid"></div>
                <div class="load-area"><button class="btn ghost" id="loadMore">Discover More Pieces ↓</button></div>
            </div>
        </section>
        <section class="editorial" id="story">
            <div class="editorial-image"><img
                    src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=1200&q=85"
                    alt="Fashion editorial" loading="lazy"></div>
            <div class="editorial-copy reveal"><span class="eyebrow">03 / Our philosophy</span>
                <h2>Style<br>Is a<br><em>Feeling.</em></h2>
                <p>Fashion is personal. It is the quiet confidence of a favourite piece, the joy of trying something new
                    and the freedom to express who you are. VÉLORA celebrates individuality over rules.</p><a
                    href="#lookbook" class="btn">Explore Our World ↗</a>
            </div>
        </section>
        <section class="section">
            <div class="wrap">
                <div class="reveal"><span class="eyebrow">04 / Why Vélora</span>
                    <h2 class="heading">Details Make<br>The Difference.</h2>
                </div>
                <div class="values-grid">
                    <article class="value reveal"><span class="value-icon">✳</span>
                        <h3>Thoughtful Design</h3>
                        <p>Modern silhouettes and versatile styling ideas designed to fit beautifully into your everyday
                            wardrobe.</p>
                    </article>
                    <article class="value reveal"><span class="value-icon">◇</span>
                        <h3>Personal Expression</h3>
                        <p>Find the colours, shapes and textures that feel like you. Your style has no fixed formula.
                        </p>
                    </article>
                    <article class="value reveal"><span class="value-icon">↗</span>
                        <h3>Everyday Inspiration</h3>
                        <p>From relaxed essentials to statement looks, discover pieces that inspire a fresh perspective.
                        </p>
                    </article>
                </div>
            </div>
        </section>
        <section class="section" id="lookbook" style="background:var(--surface2)">
            <div class="wrap">
                <div class="intro reveal">
                    <div><span class="eyebrow">05 / The lookbook</span>
                        <h2 class="heading">The Art of<br><em>Getting Dressed.</em></h2>
                    </div>
                    <p class="muted">Mix the unexpected. Layer the classics. Make every look unmistakably yours.</p>
                </div>
                <div class="lookbook">
                    <figure class="reveal"><img
                            src="https://images.unsplash.com/photo-1483985988355-763728e1935b?auto=format&fit=crop&w=800&q=85"
                            alt="Modern Muse" loading="lazy">
                        <figcaption>Modern Muse</figcaption>
                    </figure>
                    <figure class="reveal"><img
                            src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=800&q=85"
                            alt="Soft Essentials" loading="lazy">
                        <figcaption>Soft Essentials</figcaption>
                    </figure>
                    <figure class="reveal"><img
                            src="https://images.unsplash.com/photo-1529139574466-a303027c1d8b?auto=format&fit=crop&w=800&q=85"
                            alt="Everyday Icons" loading="lazy">
                        <figcaption>Everyday Icons</figcaption>
                    </figure>
                </div>
            </div>
        </section>
        <section class="testimonial"><span class="eyebrow" style="color:inherit">A NOTE FROM THE BRAND</span>
            <blockquote>“The best thing you can wear is a style that feels entirely your own.”</blockquote><small>VÉLORA
                — WEAR YOUR STORY</small>
        </section>
        <section class="newsletter" id="newsletter">
            <div class="wrap newsletter-inner">
                <div><span class="eyebrow">06 / Stay inspired</span>
                    <h2>Join the<br>Style Notes.</h2>
                    <p class="muted">New edits, outfit inspiration and stories from the world of VÉLORA.</p>
                </div>
                <form id="newsletterForm"><input type="email" required placeholder="Your email address"
                        aria-label="Email address"><button type="submit" aria-label="Subscribe">↗</button></form>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="wrap">
            <div class="footer-grid">
                <div><a href="#home" class="brand">VÉLORA</a>
                    <p>Modern fashion. Individual expression. Pieces that tell your story.</p>
                </div>
                <div>
                    <h4>Explore</h4>
                    <div class="footer-links"><a href="#shop">New Arrivals</a><a
                            href="#collections">Collections</a><a href="#lookbook">Lookbook</a><a href="#story">Our
                            Story</a></div>
                </div>
                <div>
                    <h4>Help</h4>
                    <div class="footer-links"><a href="#newsletter">Contact</a><a href="#newsletter">Shipping
                            Info</a><a href="#newsletter">Returns</a><a href="#newsletter">FAQs</a></div>
                </div>
                <div>
                    <h4>Find Us</h4>
                    <p>Online-first fashion experience.<br>Store address and contact details to be added.</p>
                </div>
            </div>
            <div class="footer-bottom"><span>© <span id="year"></span> VÉLORA. All rights
                    reserved.</span><span>Designed for the art of self-expression.</span></div>
        </div>
    </footer>
    <div class="overlay" id="overlay"></div>
    <aside class="drawer" id="drawer" role="dialog" aria-modal="true" aria-label="Shopping bag"
        aria-hidden="true">
        <div class="drawer-head">
            <h2 id="drawerTitle">Your Bag</h2><button class="icon-btn" id="closeDrawer"
                aria-label="Close drawer">✕</button>
        </div>
        <div class="drawer-items" id="drawerItems"></div>
        <div class="drawer-foot" id="drawerFoot">
            <div class="total-row"><span>Subtotal</span><span id="subtotal">₹0</span></div><button class="btn"
                id="checkout">Continue to Checkout ↗</button>
            <p>Demo store only. Checkout does not process real orders or payments. Taxes and shipping are not
                calculated.</p>
        </div>
    </aside>
    <div class="product-modal" id="productModal" role="dialog" aria-modal="true" aria-label="Product details"
        aria-hidden="true">
        <div class="product-modal-box" id="productModalBox" tabindex="-1"><button class="modal-close"
                id="modalClose" aria-label="Close product details">×</button>
            <div id="modalContent"></div>
        </div>
    </div>
    <div class="toast" id="toast" role="status" aria-live="polite"></div><button class="back-top"
        id="backTop" aria-label="Back to top">↑</button>
    <script>
        'use strict';
        const $ = id => document.getElementById(id),
            money = n => '₹' + n.toLocaleString('en-IN');
        const photo = (id, w = 750) => `https://images.unsplash.com/${id}?auto=format&fit=crop&w=${w}&q=85`;
        const rawProducts = [
            [1, 'Sculpted Blazer', 'women', 3299, 3999, 'BESTSELLER', 'photo-1485968579580-b6d095142e6e', ['#bfa99a',
                '#2c272a'
            ]],
            [2, 'Everyday Linen Shirt', 'men', 1899, 2299, 'NEW', 'photo-1598032895397-b9472444bf93', ['#ece5d9',
                '#7b8b7b'
            ]],
            [3, 'Soft Knit Layers', 'women', 2299, 0, 'EDITOR’S PICK', 'photo-1434389677669-e08b4cac3105', ['#ded0c2',
                '#62494d'
            ]],
            [4, 'Modern Street Jacket', 'outerwear', 4599, 5299, 'LIMITED EDIT', 'photo-1544923246-77307dd654cb', [
                '#393b35', '#aa8d78'
            ]],
            [5, 'Relaxed Denim', 'women', 2499, 0, 'ESSENTIAL', 'photo-1541099649105-f69ad21f3246', ['#677b9a',
                '#2c3850'
            ]],
            [6, 'Classic Oxford', 'men', 2199, 2599, 'CLASSIC', 'photo-1603252109303-2751441dd157', ['#f1e7d7',
                '#a0b2bc'
            ]],
            [7, 'Statement Tote', 'accessories', 1599, 0, 'NEW', 'photo-1547949003-9792a18a2601', ['#a5755a',
                '#27272b']],
            [8, 'Weekend Outer Layer', 'outerwear', 3899, 4499, 'TRENDING', 'photo-1544022613-e87ca75a784a', ['#d2bb9f',
                '#37383a'
            ]],
            [9, 'Fluid Summer Dress', 'women', 2799, 0, 'JUST IN', 'photo-1539008835657-9e8e9680c956', ['#e7c9ba',
                '#8d4e5c'
            ]],
            [10, 'Tailored Essentials', 'men', 2999, 0, 'VERSATILE', 'photo-1591047139829-d91aecb6caea', ['#514944',
                '#b4a697'
            ]],
            [11, 'Minimalist Crossbody', 'accessories', 1799, 2099, 'POPULAR', 'photo-1584917865442-de89df76afd3', [
                '#9a6b58', '#17181b'
            ]],
            [12, 'City Day Jacket', 'outerwear', 4299, 0, 'NEW SEASON', 'photo-1551028719-00167b16eac5', ['#392e32',
                '#998c7b'
            ]],
            [13, 'The Essential Trench', 'outerwear', 5499, 6499, 'NEW', 'photo-1591047139829-d91aecb6caea', ['#b9a28c',
                '#38332e'
            ]],
            [14, 'Pleated Midi Skirt', 'women', 2199, 2799, 'TRENDING', 'photo-1583496661160-fb5886a13d77', ['#bfae9c',
                '#302b31'
            ]],
            [15, 'Heritage Denim Jacket', 'outerwear', 3499, 4299, 'POPULAR', 'photo-1576995853123-5a10305d93c0', [
                '#6b83a3', '#343f54'
            ]],
            [16, 'Classic Leather Tote', 'accessories', 2999, 3599, 'BESTSELLER', 'photo-1547949003-9792a18a2601', [
                '#94634c', '#252525'
            ]],
            [17, 'Relaxed Cotton Tee', 'men', 999, 1299, 'ESSENTIAL', 'photo-1521572163474-6864f9cf17ab', ['#eeeeea',
                '#292929'
            ]],
            [18, 'Contemporary Knitwear', 'women', 2599, 2999, 'NEW', 'photo-1434389677669-e08b4cac3105', ['#d2bdab',
                '#69585d'
            ]],
            [19, 'Weekend Sneakers', 'accessories', 3299, 3999, 'POPULAR', 'photo-1549298916-b41d501d3772', ['#e9e3d8',
                '#252525'
            ]],
            [20, 'Structured Shoulder Bag', 'accessories', 2699, 3299, 'NEW', 'photo-1584917865442-de89df76afd3', [
                '#ac816b', '#302b2a'
            ]],
            [21, 'Urban Denim Jeans', 'men', 2299, 2799, 'CLASSIC', 'photo-1542272604-787c3835535d', ['#657b9a',
                '#292f40'
            ]],
            [22, 'Everyday White Shirt', 'women', 1799, 2199, 'TIMELESS', 'photo-1598554747436-c9293d6a588f', [
                '#eee9df', '#a9a59d'
            ]],
            [23, 'Minimal Everyday Dress', 'women', 3199, 3899, 'NEW EDIT', 'photo-1539008835657-9e8e9680c956', [
                '#c99d9e', '#47373d'
            ]],
            [24, 'The Weekend Shirt', 'men', 1999, 2499, 'EDITOR’S PICK', 'photo-1598032895397-b9472444bf93', [
                '#ddd0bc', '#414e55'
            ]]
        ];
        // Gallery arrays are editable. Replace these illustrative images with real photos of each SKU before production.
        const galleryPool = {
            women: ['photo-1483985988355-763728e1935b', 'photo-1490481651871-ab68de25d43d'],
            men: ['photo-1487222477894-8943e31ef7b2', 'photo-1598032895397-b9472444bf93'],
            outerwear: ['photo-1529139574466-a303027c1d8b', 'photo-1544022613-e87ca75a784a'],
            accessories: ['photo-1547949003-9792a18a2601', 'photo-1584917865442-de89df76afd3']
        };
        const colorNames = {
            '#bfa99a': 'Sand',
            '#2c272a': 'Charcoal',
            '#ece5d9': 'Ivory',
            '#7b8b7b': 'Sage',
            '#ded0c2': 'Cream',
            '#62494d': 'Wine',
            '#393b35': 'Olive',
            '#aa8d78': 'Taupe',
            '#677b9a': 'Blue',
            '#2c3850': 'Navy',
            '#f1e7d7': 'Ivory',
            '#a0b2bc': 'Sky',
            '#a5755a': 'Tan',
            '#27272b': 'Black',
            '#d2bb9f': 'Beige',
            '#37383a': 'Charcoal',
            '#e7c9ba': 'Blush',
            '#8d4e5c': 'Rose',
            '#514944': 'Brown',
            '#b4a697': 'Stone',
            '#9a6b58': 'Tan',
            '#17181b': 'Black'
        };
        const products = rawProducts.map(([id, name, category, price, old, tag, image, colors]) => ({
            id,
            name,
            category,
            price,
            old,
            tag,
            image: photo(image),
            images: [photo(image, 1100), ...galleryPool[category].filter(x => x !== image).map(x => photo(x,
                1100))],
            colors: colors.map(hex => ({
                hex,
                name: colorNames[hex] || ({
                    'women': 'Rose',
                    'men': 'Stone',
                    'outerwear': 'Earth',
                    'accessories': 'Tan'
                } [category])
            })),
            sizes: category === 'accessories' ? (name.toLowerCase().includes('sneaker') ? ['UK 6', 'UK 7',
                'UK 8', 'UK 9', 'UK 10'
            ] : ['One Size']) : ['XS', 'S', 'M', 'L', 'XL', 'XXL'],
            fabric: category === 'accessories' ? 'Mixed materials' : category === 'outerwear' ? 'Cotton blend' :
                category === 'men' ? 'Cotton-rich blend' : 'Soft woven fabric',
            fit: category === 'accessories' ? 'Standard' : 'Regular fit',
            care: category === 'accessories' ? 'Wipe clean with a soft cloth' :
                'Gentle cold wash; follow garment care label',
            description: `Discover ${name.toLowerCase()}, a thoughtfully styled piece from the VÉLORA ${category} edit. Designed to complement everyday outfits with modern details, versatile styling and effortless appeal.`
        }));
        let filter = 'all',
            visible = 8,
            drawerMode = 'cart',
            activeProduct = null,
            activeImage = 0,
            selectedSize = '',
            selectedColor = '',
            selectedQty = 1,
            lastFocus = null;
        const cart = new Map(),
            wishes = new Set();

        function toast(msg) {
            $('toast').textContent = msg;
            $('toast').classList.add('show');
            clearTimeout(window.toastTimer);
            window.toastTimer = setTimeout(() => $('toast').classList.remove('show'), 3000)
        }

        function safeRead(key) {
            try {
                return JSON.parse(localStorage.getItem(key) || 'null')
            } catch {
                return null
            }
        }

        function persist() {
            try {
                localStorage.setItem('velora-cart', JSON.stringify([...cart.entries()]));
                localStorage.setItem('velora-wishes', JSON.stringify([...wishes]))
            } catch (e) {}
        }
        const savedCart = safeRead('velora-cart');
        if (Array.isArray(savedCart)) savedCart.forEach(([key, qty]) => {
            if (typeof key === 'string' && Number.isInteger(qty) && qty > 0 && qty <= 99) cart.set(key, qty)
        });
        const savedWishes = safeRead('velora-wishes');
        if (Array.isArray(savedWishes)) savedWishes.forEach(id => {
            if (products.some(p => p.id === id)) wishes.add(id)
        });

        function updateCounts() {
            $('cartCount').textContent = [...cart.values()].reduce((a, b) => a + b, 0);
            $('wishCount').textContent = wishes.size;
            persist()
        }

        function setTheme(t) {
            document.documentElement.dataset.theme = t;
            $('themeBtn').textContent = t === 'dark' ? '☀' : '☾';
            $('themeBtn').setAttribute('aria-label', t === 'dark' ? 'Switch to light mode' : 'Switch to dark mode');
            document.querySelector('meta[name="theme-color"]').content = t === 'dark' ? '#131014' : '#f8f5f0';
            try {
                localStorage.setItem('velora-theme', t)
            } catch (e) {}
        }
        let theme = 'light';
        try {
            theme = localStorage.getItem('velora-theme') || 'light'
        } catch (e) {}
        setTheme(theme === 'dark' ? 'dark' : 'light');
        $('themeBtn').onclick = () => setTheme(document.documentElement.dataset.theme === 'dark' ? 'light' : 'dark');

        function syncLock() {
            document.body.classList.toggle('lock', $('mobileMenu').classList.contains('open') || $('drawer').classList
                .contains('open') || $('productModal').classList.contains('open'))
        }

        function closeMenu() {
            $('mobileMenu').classList.remove('open');
            $('menuBtn').textContent = '☰';
            $('menuBtn').setAttribute('aria-expanded', 'false');
            syncLock()
        }
        $('menuBtn').onclick = () => {
            const open = $('mobileMenu').classList.toggle('open');
            $('menuBtn').textContent = open ? '✕' : '☰';
            $('menuBtn').setAttribute('aria-expanded', String(open));
            syncLock()
        };
        $('mobileMenu').querySelectorAll('a').forEach(a => a.addEventListener('click', closeMenu));
        window.addEventListener('resize', () => {
            if (innerWidth > 820) closeMenu()
        });

        function renderProducts() {
            const matches = products.filter(p => filter === 'all' || p.category === filter),
                shown = matches.slice(0, visible);
            $('productSummary').textContent = `${matches.length} pieces`;
            $('productGrid').innerHTML = shown.map(p =>
                `<article class="product"><div class="product-image"><img src="${p.image}" alt="${p.name}" loading="lazy"><span class="product-tag">${p.tag}</span><button class="wish ${wishes.has(p.id)?'active':''}" data-wish="${p.id}" aria-label="${wishes.has(p.id)?'Remove from':'Add to'} wishlist">${wishes.has(p.id)?'♥':'♡'}</button><div class="product-actions"><button data-details="${p.id}">VIEW DETAILS</button><button data-add="${p.id}">ADD TO BAG ↗</button></div></div><div class="product-info"><small>VÉLORA / ${p.category}</small><h3>${p.name}</h3><div class="product-bottom"><span>${money(p.price)} ${p.old?`<span class="old">${money(p.old)}</span>`:''}</span><span class="swatches">${p.colors.map(c=>`<span title="${c.name}" style="background:${c.hex}"></span>`).join('')}</span></div></div></article>`
                ).join('');
            $('loadMore').hidden = shown.length >= matches.length
        }

        function setFilter(value) {
            filter = value;
            visible = 8;
            $('filters').querySelectorAll('.filter').forEach(b => b.classList.toggle('active', b.dataset.filter ===
            filter));
            renderProducts()
        }
        $('filters').onclick = e => {
            const b = e.target.closest('[data-filter]');
            if (b) setFilter(b.dataset.filter)
        };
        $('loadMore').onclick = () => {
            visible += 4;
            renderProducts()
        };
        document.querySelectorAll('[data-collection]').forEach(a => a.onclick = () => setFilter(a.dataset.collection));
        $('productGrid').onclick = e => {
            const w = e.target.closest('[data-wish]'),
                b = e.target.closest('[data-details],[data-add]');
            if (w) {
                const id = Number(w.dataset.wish);
                wishes.has(id) ? wishes.delete(id) : wishes.add(id);
                updateCounts();
                renderProducts();
                toast(wishes.has(id) ? 'Saved to wishlist' : 'Removed from wishlist')
            } else if (b) openProduct(Number(b.dataset.details || b.dataset.add))
        };

        function openProduct(id) {
            const p = products.find(x => x.id === id);
            if (!p) return;
            lastFocus = document.activeElement;
            activeProduct = p;
            activeImage = 0;
            selectedSize = '';
            selectedColor = '';
            selectedQty = 1;
            renderModal();
            $('productModal').classList.add('open');
            $('productModal').setAttribute('aria-hidden', 'false');
            syncLock();
            $('modalClose').focus()
        }

        function renderModal() {
            const p = activeProduct;
            if (!p) return;
            $('modalContent').innerHTML =
                `<div class="modal-layout"><div class="modal-gallery"><img class="modal-main-image" id="modalMainImage" src="${p.images[activeImage]}" alt="${p.name} product view ${activeImage+1}"><div class="modal-thumbnails">${p.images.map((src,i)=>`<button data-image="${i}" class="${activeImage===i?'active':''}" aria-label="Show product image ${i+1}" aria-pressed="${activeImage===i}"><img src="${src}" alt="${p.name} view ${i+1}"></button>`).join('')}</div><div class="modal-arrows"><button data-prev>← Previous image</button><button data-next>Next image →</button></div></div><div class="modal-details"><span class="eyebrow">VÉLORA / ${p.category.toUpperCase()} / ${p.tag}</span><h2>${p.name}</h2><div class="modal-price">${money(p.price)} ${p.old?`<del>${money(p.old)}</del>`:''}</div><p class="modal-description">${p.description}</p><div class="modal-divider"></div><div class="option-title">SELECT SIZE <span id="sizeLabel">${selectedSize||'Required'}</span></div><div class="size-options">${p.sizes.map(size=>`<button class="size-option ${selectedSize===size?'active':''}" data-size="${size}" aria-pressed="${selectedSize===size}">${size}</button>`).join('')}</div><div class="option-title">SELECT COLOR <span id="colorLabel">${selectedColor?p.colors.find(c=>c.hex===selectedColor)?.name:'Required'}</span></div><div class="color-options">${p.colors.map(c=>`<button class="color-option ${selectedColor===c.hex?'active':''}" data-color="${c.hex}" title="${c.name}" aria-label="${c.name}" aria-pressed="${selectedColor===c.hex}"><span style="background:${c.hex}"></span></button>`).join('')}</div><div class="option-title">QUANTITY <span>Maximum 99 per variant</span></div><div class="modal-quantity"><button data-quantity="-1" aria-label="Decrease quantity">−</button><strong id="modalQty">${selectedQty}</strong><button data-quantity="1" aria-label="Increase quantity">+</button></div><p class="selection-error" id="selectionError" role="status"></p><button class="btn modal-add" id="modalAdd">ADD TO BAG — ${money(p.price*selectedQty)} ↗</button><div class="product-specs"><p><strong>Fabric / Material</strong><span>${p.fabric}</span></p><p><strong>Fit</strong><span>${p.fit}</span></p><p><strong>Care Instructions</strong><span>${p.care}</span></p><p><strong>Product Code</strong><span>VL-${String(p.id).padStart(4,'0')}</span></p><p><strong>Availability</strong><span>Demo catalogue</span></p></div></div></div>`
        }

        function closeProduct() {
            if (!$('productModal').classList.contains('open')) return;
            $('productModal').classList.remove('open');
            $('productModal').setAttribute('aria-hidden', 'true');
            activeProduct = null;
            syncLock();
            if (lastFocus && lastFocus.isConnected) lastFocus.focus()
        }
        $('modalClose').onclick = closeProduct;
        $('productModal').onclick = e => {
            if (e.target === $('productModal')) closeProduct()
        };
        $('modalContent').onclick = e => {
            if (!activeProduct) return;
            const image = e.target.closest('[data-image]'),
                size = e.target.closest('[data-size]'),
                color = e.target.closest('[data-color]'),
                qty = e.target.closest('[data-quantity]');
            if (image || e.target.closest('[data-prev],[data-next]')) {
                if (image) activeImage = Number(image.dataset.image);
                else activeImage = (activeImage + (e.target.closest('[data-next]') ? 1 : -1) + activeProduct.images
                    .length) % activeProduct.images.length;
                $('modalMainImage').src = activeProduct.images[activeImage];
                $('modalMainImage').alt = `${activeProduct.name} product view ${activeImage+1}`;
                $('modalContent').querySelectorAll('[data-image]').forEach(b => {
                    const active = Number(b.dataset.image) === activeImage;
                    b.classList.toggle('active', active);
                    b.setAttribute('aria-pressed', String(active))
                })
            }
            if (size) {
                selectedSize = size.dataset.size;
                $('modalContent').querySelectorAll('[data-size]').forEach(b => {
                    b.classList.toggle('active', b === size);
                    b.setAttribute('aria-pressed', String(b === size))
                });
                $('sizeLabel').textContent = selectedSize;
                $('selectionError').textContent = ''
            }
            if (color) {
                selectedColor = color.dataset.color;
                $('modalContent').querySelectorAll('[data-color]').forEach(b => {
                    b.classList.toggle('active', b === color);
                    b.setAttribute('aria-pressed', String(b === color))
                });
                $('colorLabel').textContent = activeProduct.colors.find(c => c.hex === selectedColor)?.name || '';
                $('selectionError').textContent = ''
            }
            if (qty) {
                selectedQty = Math.max(1, Math.min(99, selectedQty + Number(qty.dataset.quantity)));
                $('modalQty').textContent = selectedQty;
                $('modalAdd').textContent = `ADD TO BAG — ${money(activeProduct.price*selectedQty)} ↗`
            }
            if (e.target.closest('#modalAdd')) {
                if (!selectedSize || !selectedColor) {
                    $('selectionError').textContent = 'Please select both a size and a color.';
                    return
                }
                const key = `${activeProduct.id}|${selectedSize}|${selectedColor}`,
                    existing = cart.get(key) || 0;
                cart.set(key, Math.min(99, existing + selectedQty));
                updateCounts();
                const name = activeProduct.name;
                closeProduct();
                toast(`${name} added to your bag`)
            }
        };

        function openDrawer(mode) {
            closeMenu();
            drawerMode = mode;
            $('drawerTitle').textContent = mode === 'cart' ? 'Your Bag' : 'Your Wishlist';
            $('drawerFoot').style.display = mode === 'cart' ? 'block' : 'none';
            renderDrawer();
            $('overlay').classList.add('open');
            $('drawer').classList.add('open');
            $('drawer').setAttribute('aria-hidden', 'false');
            syncLock();
            $('closeDrawer').focus()
        }

        function closeDrawer() {
            const wasOpen = $('drawer').classList.contains('open');
            $('overlay').classList.remove('open');
            $('drawer').classList.remove('open');
            $('drawer').setAttribute('aria-hidden', 'true');
            syncLock();
            if (wasOpen)(drawerMode === 'cart' ? $('cartBtn') : $('wishBtn')).focus()
        }
        $('cartBtn').onclick = () => openDrawer('cart');
        $('wishBtn').onclick = () => openDrawer('wish');
        $('closeDrawer').onclick = closeDrawer;
        $('overlay').onclick = closeDrawer;

        function renderDrawer() {
            let subtotal = 0;
            const entries = drawerMode === 'cart' ? [...cart.entries()].map(([key, qty]) => {
                const [id, size, color] = key.split('|');
                return {
                    key,
                    p: products.find(x => x.id === Number(id)),
                    qty,
                    size,
                    color
                }
            }).filter(x => x.p) : [...wishes].map(id => ({
                key: String(id),
                p: products.find(x => x.id === id),
                qty: 1
            })).filter(x => x.p);
            $('drawerItems').innerHTML = entries.length ? entries.map(({
                    key,
                    p,
                    qty,
                    size,
                    color
                }, i) => {
                    subtotal += p.price * qty;
                    const colorName = p.colors.find(c => c.hex === color)?.name || '—';
                    return `<div class="cart-item"><img src="${p.image}" alt="${p.name}"><div style="flex:1;min-width:0"><h3>${p.name}</h3><p>${money(p.price)} · ${p.category}</p>${drawerMode==='cart'?`<div class="cart-variant">Size: ${size} · Color: ${colorName}<span style="display:inline-block;width:10px;height:10px;border-radius:50%;background:${color};margin-left:5px;border:1px solid var(--line)"></span></div><div class="qty"><button data-qty="${i}" data-change="-1" aria-label="Decrease quantity">−</button><span>${qty}</span><button data-qty="${i}" data-change="1" aria-label="Increase quantity">+</button><button data-delete="${i}" style="width:auto;padding:0 9px" aria-label="Remove item">Remove</button></div>`:`<button class="btn ghost" data-move="${p.id}" style="padding:8px 12px;min-height:35px;font-size:9px">SELECT OPTIONS</button><button class="icon-btn" data-remove="${p.id}" aria-label="Remove from wishlist" style="display:inline-grid;margin-left:7px">×</button>`}</div></div>`
                }).join('') :
                '<div class="empty">Nothing here yet.<br>Explore the collection and find your favourites.</div>';
            $('subtotal').textContent = money(subtotal);
            $('checkout').disabled = !entries.length
        }
        $('drawerItems').onclick = e => {
            const q = e.target.closest('[data-qty]'),
                d = e.target.closest('[data-delete]'),
                m = e.target.closest('[data-move]'),
                r = e.target.closest('[data-remove]');
            if (q || d) {
                const keys = [...cart.keys()],
                    key = keys[Number((q || d).dataset.qty ?? d?.dataset.delete)];
                if (key) {
                    if (d) cart.delete(key);
                    else {
                        const next = (cart.get(key) || 0) + Number(q.dataset.change);
                        next <= 0 ? cart.delete(key) : cart.set(key, Math.min(99, next))
                    }
                }
            }
            if (m) {
                const id = Number(m.dataset.move);
                closeDrawer();
                openProduct(id)
            }
            if (r) {
                wishes.delete(Number(r.dataset.remove));
                renderProducts()
            }
            updateCounts();
            renderDrawer()
        };
        $('checkout').onclick = () => toast(
            'Demo checkout only. Connect a Laravel backend and secure payment gateway for real orders.');
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                if ($('productModal').classList.contains('open')) closeProduct();
                else if ($('drawer').classList.contains('open')) closeDrawer();
                else closeMenu()
            }
            if (e.key === 'Tab') {
                const panel = $('productModal').classList.contains('open') ? $('productModalBox') : $('drawer')
                    .classList.contains('open') ? $('drawer') : null;
                if (!panel) return;
                const f = [...panel.querySelectorAll('button:not([disabled]),input:not([disabled]),a[href]')]
                    .filter(x => x.getClientRects().length);
                if (!f.length) return;
                const first = f[0],
                    last = f[f.length - 1];
                if (e.shiftKey && document.activeElement === first) {
                    e.preventDefault();
                    last.focus()
                } else if (!e.shiftKey && document.activeElement === last) {
                    e.preventDefault();
                    first.focus()
                }
            }
        });
        $('newsletterForm').onsubmit = e => {
            e.preventDefault();
            if (e.currentTarget.reportValidity()) {
                toast('Demo signup: connect your newsletter service to save emails.');
                e.currentTarget.reset()
            }
        };
        $('year').textContent = new Date().getFullYear();
        const reveals = document.querySelectorAll('.reveal');
        if ('IntersectionObserver' in window) {
            const io = new IntersectionObserver(entries => entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                    io.unobserve(entry.target)
                }
            }), {
                threshold: .08
            });
            reveals.forEach(el => io.observe(el))
        } else reveals.forEach(el => el.classList.add('show'));

        function onScroll() {
            const d = document.documentElement,
                max = d.scrollHeight - innerHeight;
            $('progress').style.width = (max > 0 ? scrollY / max * 100 : 0) + '%';
            $('header').classList.toggle('scrolled', scrollY > 30);
            $('backTop').classList.toggle('show', scrollY > 600)
        }
        window.addEventListener('scroll', onScroll, {
            passive: true
        });
        $('backTop').onclick = () => window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
        renderProducts();
        updateCounts();
        onScroll();
    </script>
</body>

</html>
