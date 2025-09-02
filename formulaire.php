<!DOCTYPE html>
<html lang="fr">
<head>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Avis - La Poste</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', system-ui, sans-serif;
            background: linear-gradient(135deg, #0f1729 0%, #1e3a8a 50%, #312e81 100%);
            color: white;
            overflow-x: hidden;
            min-height: 100vh;
            font-weight: 400;
            letter-spacing: -0.025em;
        }

        .main-container {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            padding: 2rem;
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Effets néon de fond */
        body::before {
            content: '';
            position: fixed;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(251, 191, 36, 0.08) 0%, transparent 50%);
            animation: pulse 6s ease-in-out infinite;
            z-index: 0;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.3; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.1); }
        }

        .container {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(25px) saturate(180%);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 32px;
            box-shadow: 
                0 40px 80px rgba(0, 0, 0, 0.3),
                0 0 30px rgba(255, 255, 255, 0.15),
                inset 0 1px 0 rgba(255, 255, 255, 0.3),
                inset 0 0 20px rgba(255, 255, 255, 0.05);
            animation: subtleGlow 3s ease-in-out infinite alternate;
            position: relative;
            overflow: hidden;
            max-width: 500px;
            width: 90%;
            z-index: 1;
            margin: 6rem auto;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        .header {
            background: linear-gradient(135deg, rgba(15, 23, 41, 0.95) 0%, rgba(30, 58, 138, 0.95) 70%, rgba(49, 46, 129, 0.95) 100%);
            color: white;
            padding: 50px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Effet néon dans l'header */
        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(251, 191, 36, 0.2), transparent);
            animation: shine 3s infinite;
        }

        @keyframes shine {
            0% { left: -100%; }
            100% { left: 100%; }
        }

        .logos-container {
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
        }

        .logo-laposte {
            width: 14rem;
            height: auto;
            filter: drop-shadow(0 0 20px rgba(251, 191, 36, 0.5));
            display: block;
            margin: 0 auto;
            border-radius: 10px;
        }

        

        .header h1 {
            font-size: 28px;
            font-weight: 800;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
            text-shadow: 
                0 0 20px rgba(251, 191, 36, 0.5),
                0 2px 4px rgba(0, 0, 0, 0.3);
            letter-spacing: 1px;
        }

    
        

        @keyframes goldenPulse {
            0%, 100% { opacity: 0.8; transform: scaleX(1); }
            50% { opacity: 1; transform: scaleX(1.1); }
        }

        .logo-logissimo {
            width: 100px;
            height: auto;
            filter: drop-shadow(0 0 15px rgba(251, 191, 36, 0.3));
            flex-shrink: 0;
            border-radius: 10px;
        }
        .header-separator {
            width: 120px;
            height: 3px;
            background: linear-gradient(90deg, transparent, #fbbf24, #f59e0b, #fbbf24, transparent);
            border-radius: 2px;
            box-shadow: 
                0 0 10px rgba(251, 191, 36, 0.6),
                0 2px 4px rgba(0, 0, 0, 0.2);
            animation: goldenPulse 2s ease-in-out infinite;
            margin: 25px auto;
        }

        .title-separator {
            width: 250px;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), rgba(255, 255, 255, 0.4), transparent);
            margin-bottom: 8px;
            opacity: 0.8;
        }

        .logissimo-container {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            gap: 20px;
            margin-top: 20px;
        }

        .tagline-container {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .tagline {
            font-size: 13px;
            opacity: 0.9;
            font-style: italic;
            color: rgba(255, 255, 255, 0.8);
            text-align: left;
            margin: 0;
        }

        .form-container {
            padding: 40px 30px;
            background: linear-gradient(135deg, #ffffff 0%, #f8faff 100%);
        }

        .section {
            margin-bottom: 35px;
        }

        .section-title {
            font-size: 16px;
            font-weight: 700;
            color: #0f1729;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-align: center;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 2px;
            background: linear-gradient(90deg, #fbbf24, #1e3a8a);
            border-radius: 1px;
        }

        .form-group {
            margin-bottom: 28px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-weight: 700;
            color: #0f1729;
            font-size: 15px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 18px 24px;
            border: 1.5px solid rgba(15, 23, 41, 0.15);
            border-radius: 20px;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 
                0 2px 8px rgba(0, 0, 0, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #fbbf24;
            background: #ffffff;
            box-shadow: 
                0 0 0 4px rgba(251, 191, 36, 0.1),
                0 0 30px rgba(251, 191, 36, 0.3);
        }

        .form-group input:focus::before,
        .form-group textarea:focus::before,
        .form-group select:focus::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(251, 191, 36, 0.1), transparent);
            animation: gentleShine 2s infinite;
        }

        @keyframes gentleShine {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        @keyframes subtleGlow {
            0% {
                box-shadow: 
                    0 40px 80px rgba(0, 0, 0, 0.3),
                    0 0 20px rgba(255, 255, 255, 0.1),
                    inset 0 1px 0 rgba(255, 255, 255, 0.3),
                    inset 0 0 20px rgba(255, 255, 255, 0.05);
            }
            100% {
                box-shadow: 
                    0 40px 80px rgba(0, 0, 0, 0.3),
                    0 0 40px rgba(255, 255, 255, 0.2),
                    inset 0 1px 0 rgba(255, 255, 255, 0.4),
                    inset 0 0 30px rgba(255, 255, 255, 0.08);
            }
        }

        /* Validation verte */
        .form-group.valid input,
        .form-group.valid textarea,
        .form-group.valid select {
            border-color: #10b981;
            box-shadow: 
                0 0 0 4px rgba(16, 185, 129, 0.1),
                0 0 20px rgba(16, 185, 129, 0.2);
        }

        .form-group.valid::after {
            content: '✓';
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #10b981;
            font-weight: bold;
            font-size: 18px;
        }

        .rating-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px;
            margin-bottom: 30px;
        }

        .rating-item {
            background: linear-gradient(135deg, #ffffff 0%, #f1f5f9 100%);
            padding: 25px 20px;
            border-radius: 18px;
            border: 2px solid rgba(251, 191, 36, 0.1);
            transition: all 0.6s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 
                0 8px 16px rgba(0, 0, 0, 0.08),
                inset 0 1px 0 rgba(255, 255, 255, 0.5);
            position: relative;
            overflow: hidden;
        }

        .rating-item:hover {
            border-color: #fbbf24;
            transform: translateY(-2px);
            box-shadow: 
                0 20px 40px rgba(0, 0, 0, 0.15),
                0 0 30px rgba(251, 191, 36, 0.2);
        }

        .rating-item:hover::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(168, 85, 247, 0.3), transparent);
            animation: gentleShine 1.5s;
            pointer-events: none;
        }

        .rating-item.valid {
            border-color: #10b981;
            box-shadow: 
                0 12px 24px rgba(0, 0, 0, 0.1),
                0 0 20px rgba(16, 185, 129, 0.2);
        }

        .rating-item label {
            margin-bottom: 16px;
            font-size: 14px;
            text-align: center;
            color: #0f1729;
        }

        .stars {
            display: flex;
            justify-content: center;
            gap: 8px;
        }

        .star {
            cursor: pointer;
            font-size: 32px;
            color: #e2e8f0;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.1));
            position: relative;
        }

        .star::before {
            content: '★';
            position: absolute;
            top: 0;
            left: 0;
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            opacity: 0;
            transition: opacity 0.4s ease;
            transform: scale(1.1);
            filter: drop-shadow(0 0 12px rgba(251, 191, 36, 0.8));
        }

        .star:hover::before,
        .star.active::before {
            opacity: 1;
        }

        .star:hover,
        .star.active {
            transform: scale(1.15) rotate(5deg);
            color: transparent;
        }

        .quartier-section {
            margin-bottom: 30px;
        }

        .quartier-select {
            margin-bottom: 15px;
        }

        .livreur-info {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            color: white;
            padding: 15px 20px;
            border-radius: 12px;
            text-align: center;
            font-weight: 600;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.4s ease;
            box-shadow: 0 8px 16px rgba(245, 158, 11, 0.3);
        }

        .livreur-info.show {
            opacity: 1;
            transform: translateY(0);
        }

        .livreur-info:hover {
            transform: scale(1.05);
            box-shadow: 
                0 12px 24px rgba(245, 158, 11, 0.4),
                0 0 30px rgba(251, 191, 36, 0.6);
            filter: brightness(1.1);
        }

        .livreur-info.show:hover {
            transform: translateY(0) scale(1.05);
        }

        .livreur-placeholder {
            background: #1e3a8a;
            color: #fbbf24;
            padding: 15px 20px;
            border-radius: 12px;
            text-align: center;
            font-weight: 600;
            font-size: 14px;
            opacity: 0.9;
        }

        .tips-section {
            background: linear-gradient(135deg, #0f1729 0%, #1e3a8a 100%);
            margin: 0 -30px 30px -30px;
            padding: 25px 30px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .tips-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(251, 191, 36, 0.1) 0%, transparent 50%);
            animation: shimmer 2s infinite;
        }

        @keyframes shimmer {
            0%, 100% { opacity: 0.3; }
            50% { opacity: 0.7; }
        }

        .tips-section h3 {
            margin-bottom: 15px;
            font-size: 18px;
            position: relative;
            z-index: 2;
            text-shadow: 0 0 10px rgba(251, 191, 36, 0.5);
        }

        .tip-question {
            display: flex;
            gap: 15px;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 2;
        }

        .tip-btn::before,
        .tip-option::before,
        .selfie-label::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(168, 85, 247, 0.6), transparent);
            transition: left 0.6s;
            z-index: -1;
        }

        .tip-btn {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(251, 191, 36, 0.3);
            border-radius: 12px;
            padding: 12px 24px;
            color: white;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            font-weight: 600;
            font-size: 15px;
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        .tip-btn:hover::before {
            left: 100%;
        }

        .tip-btn:hover,
        .tip-btn.selected {
            background: #fbbf24;
            border-color: #fbbf24;
            color: #0f1729;
            transform: translateY(-2px);
            box-shadow: 
                0 8px 16px rgba(251, 191, 36, 0.4),
                0 0 20px rgba(251, 191, 36, 0.6);
        }

        .tip-amount-section {
            margin-top: 20px;
            display: none;
            position: relative;
            z-index: 2;
        }

        .tip-amount-section.show {
            display: block;
            animation: fadeInUp 0.4s ease-out;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .tip-options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 12px;
            margin-top: 15px;
        }

        .tip-option {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 10px;
            padding: 10px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            font-weight: 600;
            backdrop-filter: blur(5px);
            position: relative;
            overflow: hidden;
        }

        .tip-option:hover::before {
            left: 100%;
        }

        .tip-option:hover,
        .tip-option.selected {
            background: rgba(251, 191, 36, 0.9);
            border-color: #fbbf24;
            color: #0f1729;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(251, 191, 36, 0.4);
        }

        .selfie-section {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            margin: 0 -30px 30px -30px;
            padding: 25px 30px;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .selfie-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.1) 0%, transparent 50%);
            animation: shimmer 2s infinite;
        }

        .selfie-section h3 {
            margin-bottom: 15px;
            font-size: 18px;
            position: relative;
            z-index: 2;
        }

        .selfie-upload {
            position: relative;
            z-index: 2;
        }

        .selfie-input {
            display: none;
        }

        .selfie-label {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            border: 2px dashed rgba(255, 255, 255, 0.5);
            border-radius: 12px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            position: relative;
            overflow: hidden;
        }

        .selfie-label:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: white;
            transform: translateY(-2px);
        }

        .selfie-label:hover::before {
            left: 100%;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #fbbf24 100%);
            color: white;
            border: none;
            padding: 22px 32px;
            border-radius: 24px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            box-shadow: 
                0 20px 40px rgba(30, 58, 138, 0.4),
                0 8px 16px rgba(0, 0, 0, 0.1),
                inset 0 1px 0 rgba(255, 255, 255, 0.2);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .submit-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(168, 85, 247, 0.7), transparent);
            transition: left 0.6s;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 
                0 20px 40px rgba(30, 58, 138, 0.4),
                0 0 30px rgba(251, 191, 36, 0.4);
        }

        .submit-btn:hover::before {
            left: 100%;
        }

        .submit-btn:active {
            transform: translateY(-1px);
        }

        .footer-credit {
            text-align: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid rgba(15, 23, 41, 0.1);
            color: #64748b;
            font-size: 13px;
        }

        .footer-credit a {
            color: #1e3a8a;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .footer-credit a:hover {
            color: #fbbf24;
        }

        .privacy-notice {
            background: rgba(251, 191, 36, 0.1);
            border: 1px solid rgba(251, 191, 36, 0.2);
            border-radius: 12px;
            padding: 15px 20px;
            margin-bottom: 25px;
            font-size: 13px;
            color: #0f1729;
            text-align: center;
        }

        .privacy-notice strong {
            color: #1e3a8a;
        }

        /* Confetti Animation */
        .confetti {
            position: fixed;
            width: 10px;
            height: 10px;
            background: #fbbf24;
            animation: confetti-fall 3s linear forwards;
            pointer-events: none;
            z-index: 1000;
        }

        .confetti:nth-child(odd) {
            background: #1e3a8a;
            border-radius: 50%;
        }

        .confetti:nth-child(3n) {
            background: #10b981;
        }

        .confetti:nth-child(4n) {
            background: #f59e0b;
            transform: rotate(45deg);
        }

        @keyframes confetti-fall {
            0% {
                transform: translateY(-100vh) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(100vh) rotate(720deg);
                opacity: 0;
            }
        }

        @media (max-width: 480px) {
            
            .header-separator {
                width: 80px;
                height: 2px;
                margin: 20px auto;
            }
          .title-separator {
                width: 200px;
                margin-bottom: 6px;
            }
            
            .logissimo-container {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 15px;
            }
            
            .tagline-container {
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            
            .tagline {
                text-align: center;
                font-size: 11px;
                line-height: 1.4;
            }
            .main-container {
                padding: 1rem;
            }
            
            .container {
                max-width: none;
                width: 95%;
                margin: 1rem auto;
                border-radius: 16px;
            }
            
            .header {
                padding: 25px 20px;
            }
            
            .header h1 {
                font-size: 22px;
            }
            
            .logo-laposte {
                width: 10rem;
            }
            
            .logo-logissimo {
                width: 80px;
            }
            
            .form-container {
                padding: 25px 20px;
            }
            
            .rating-group {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .rating-item {
                padding: 20px 15px;
            }
            
            .tip-options {
                grid-template-columns: repeat(2, 1fr);
            }

            .logos-container {
                flex-direction: column;
                gap: 15px;
            }
        
        }

        @media (max-width: 360px) {
            .container {
                width: 98%;
                margin: 0.5rem auto;
            }
            
            .main-container {
                padding: 0.5rem;
            }
            
            .form-container {
                padding: 20px 15px;
            }
            
            .header {
                padding: 20px 15px;
            }
        }
        .thank-you-panel {
            display: none;
            text-align: center;
            padding: 60px 30px;
        }

        .thank-you-title {
            font-size: 36px;
            font-weight: 800;
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 30px rgba(251, 191, 36, 0.6);
            margin-bottom: 30px;
            cursor: pointer;
            transition: all 1s ease;
            letter-spacing: 2px;
            animation: goldShine 3s ease-in-out infinite;
        }

        .thank-you-title:hover {
            background: linear-gradient(135deg, #1e3a8a 0%, #312e81 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 0 30px rgba(30, 58, 138, 0.6);
            transform: scale(1.05);
        }

        @keyframes goldShine {
            0%, 100% { filter: brightness(1); }
            50% { filter: brightness(1.3); }
        }

        .thank-you-message {
            font-size: 18px;
            color: #0f1729;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        /* LOADER PAGE */
        .loader-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background: linear-gradient(45deg, #ffffff 0%, #f8faff 50%, #1e3a8a 100%);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 10000;
            transition: opacity 1s ease, visibility 1s ease;
        }

        
        .loader-container.hidden {
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
        }


        .loader {
            width: 120px;
            height: 120px;
            border: 3px solid rgba(30, 58, 138, 0.1);
            border-top: 3px solid #1e3a8a;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            position: relative;
        }

        .loader::before {
            content: '';
            position: absolute;
            top: 10px;
            left: 10px;
            right: 10px;
            bottom: 10px;
            border: 2px solid rgba(30, 58, 138, 0.1);
            border-left: 2px solid #1e3a8a;
            border-radius: 50%;
            animation: spin 1.5s linear infinite reverse;
        }

        .loader-text {
            margin-top: 2rem;
            font-size: 18px;
            font-weight: 600;
            color: #1e3a8a;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.6; }
            50% { opacity: 1; }
        }
    </style>
</head>
<body>
    <!-- LOADER -->
    <div class="loader-container" id="loader">
        <div class="loader"></div>
        <div class="loader-text">Chargement des paquets...</div>
    </div>
    <div class="container">
        <div class="header">
            <div class="logos-container">
                    <img src="LOGO_LAPOSTE.png" alt="La Poste" class="logo-laposte">
                </div>
                
                <div class="header-separator"></div>
                
                <h1>Votre Avis Compte !</h1>
                                
                <div class="logissimo-container">
                    <div class="tagline-container">
                        <div class="title-separator"></div>
                        <p class="tagline">La puissance logistique de La Poste au service de votre Supply Chain</p>
                    </div>
                    <img src="LOGO_LOGISSIMO.avif" alt="Logissimo" class="logo-logissimo">
                </div>
            </div>

        <div class="form-container">
            <div class="privacy-notice">
                <strong>Confidentialité :</strong> Ce formulaire peut être rempli de manière anonyme ou partiellement nominative (prénom et/ou nom, numéro de rue ou rue ou quartier seulement). Vos données restent confidentielles.
            </div>
            
            <form id="feedbackForm" action="submit.php" method="POST">
                <div class="section">
                    <h2 class="section-title">Informations Client</h2>
                    
                    <div class="form-group">
                        <label for="nom">Nom & Prénom</label>
                        <input type="text" id="nom" name="nom" placeholder="Votre nom complet">
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse de livraison</label>
                        <input type="text" id="adresse" name="adresse" placeholder="Votre adresse complète">
                    </div>
                    <div class="form-group">
                        <label for="date_reception">Date de réception du colis</label>
                        <input type="date" id="date_reception" name="date_reception">
                    </div>
                </div>

                <div class="section quartier-section">
                    <h2 class="section-title">Votre Quartier</h2>
                    
                    <div class="form-group quartier-select">
                        <label for="quartier">Sélectionnez votre quartier</label>
                        <select id="quartier" name="quartier">
                            <option value="">-- Choisissez votre quartier --</option>
                            <option value="jardin-mail">Quartier Jardin Mail / Quinconce / Louis Gain</option>
                            <option value="pasteur">Quartier Pasteur</option>
                            <option value="pont-de-ce">Quartier Pont de cé</option>
                        </select>
                    </div>
                    
                    <div class="livreur-placeholder" id="livreurPlaceholder">
                        Remplissez au-dessus pour savoir qui vous a livré
                    </div>
                    <div class="livreur-info" id="livreurInfo">
                        <span id="livreurNom"></span> s'est occupé de votre livraison aujourd'hui ! 👋
                    </div>
                </div>

                <div class="section">
                    <h2 class="section-title">Évaluation du Service</h2>
                    
                    <div class="rating-group">
                        <div class="rating-item">
                            <label>Qualité de la livraison</label>
                            <div class="stars" data-rating="livraison">
                                <span class="star" data-value="1">★</span>
                                <span class="star" data-value="2">★</span>
                                <span class="star" data-value="3">★</span>
                                <span class="star" data-value="4">★</span>
                                <span class="star" data-value="5">★</span>
                            </div>
                        </div>

                        <div class="rating-item">
                            <label>Amabilité du livreur</label>
                            <div class="stars" data-rating="amabilite">
                                <span class="star" data-value="1">★</span>
                                <span class="star" data-value="2">★</span>
                                <span class="star" data-value="3">★</span>
                                <span class="star" data-value="4">★</span>
                                <span class="star" data-value="5">★</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="commentaire">Commentaire (optionnel)</label>
                        <textarea id="commentaire" name="commentaire" rows="3" placeholder="Partagez votre expérience avec nous..."></textarea>
                    </div>
                </div>

                <div class="tips-section">
                    <h3>💛 Avez-vous laissé un pourboire ?</h3>
                    <div class="tip-question">
                        <button type="button" class="tip-btn" data-tip="oui">Oui</button>
                        <button type="button" class="tip-btn" data-tip="non">Non</button>
                    </div>
                    
                    <div class="tip-amount-section" id="tipAmountSection">
                        <p style="margin-bottom: 10px; text-align: center; font-size: 14px;">Souhaitez-vous en laisser un maintenant ?</p>
                        <div class="tip-options">
                            <div class="tip-option" data-tip="1">1€</div>
                            <div class="tip-option" data-tip="2">2€</div>
                            <div class="tip-option" data-tip="3">3€</div>
                            <div class="tip-option" data-tip="5">5€</div>
                            <div class="tip-option" data-tip="custom">Autre</div>
                            <div class="tip-option" data-tip="none"> 0€ ;(</div>
                        </div>
                    </div>
                </div>

                <div class="selfie-section">
                    <h3>📸 Partagez votre sourire ! (optionnel)</h3>
                    <p style="margin-bottom: 15px; font-size: 14px; opacity: 0.9;">Prenez un selfie avec un pouce en l'air pour partager votre satisfaction !</p>
                    <div class="selfie-upload">
                        <input type="file" id="selfie" name="selfie" accept="image/*" capture="user" class="selfie-input">
                        <label for="selfie" class="selfie-label">
                            📱 Prendre un selfie
                        </label>
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    Envoyer mon avis
                </button>
                <input type="hidden" id="evaluation_livraison" name="evaluation_livraison" value="">
                <input type="hidden" id="evaluation_amabilite" name="evaluation_amabilite" value="">
                <input type="hidden" id="pourboire" name="pourboire" value="">
            </form>
            
            <div class="footer-credit">
                Application réalisée par <a href="https://www.instagram.com/raphael_bely/" target="_blank">Raphaël Bély</a>
            </div>
        </div>
    </div>

    <script>
        // LOADER - Gestion automatique
        document.addEventListener('DOMContentLoaded', () => {
            const loader = document.getElementById('loader');
            
            // Forcer l'affichage du loader
            loader.style.display = 'flex';
            
            // Masquer le loader après 3 secondes
            setTimeout(() => {
                loader.classList.add('hidden');
                
                // Supprimer complètement après l'animation
                setTimeout(() => {
                    loader.style.display = 'none';
                }, 1000);
                
            }, 3000);
        });

        // Validation des champs
        function validateField(field) {
            const formGroup = field.closest('.form-group');
            if (field.value.trim() !== '') {
                formGroup.classList.add('valid');
            } else {
                formGroup.classList.remove('valid');
            }
        }

        // Écouteurs pour la validation
        document.querySelectorAll('input, textarea, select').forEach(field => {
            field.addEventListener('input', () => validateField(field));
            field.addEventListener('change', () => validateField(field));
        });

        // Gestion du quartier et affichage du livreur
        document.getElementById('quartier').addEventListener('change', function() {
            const livreurInfo = document.getElementById('livreurInfo');
            const livreurPlaceholder = document.getElementById('livreurPlaceholder');
            const livreurNom = document.getElementById('livreurNom');
            
            const livreurs = {
                'jardin-mail': 'Raphaël',
                'pasteur': 'Carinne',
                'pont-de-ce': 'Baptiste'
            };
            
            if (this.value && livreurs[this.value]) {
                livreurNom.textContent = livreurs[this.value];
                livreurPlaceholder.style.display = 'none';
                livreurInfo.classList.add('show');
            } else {
                livreurPlaceholder.style.display = 'block';
                livreurInfo.classList.remove('show');
            }
            
            validateField(this);
        });

        // Gestion des étoiles
        document.querySelectorAll('.stars').forEach(starsContainer => {
            const stars = starsContainer.querySelectorAll('.star');
            let selectedRating = 0;

            stars.forEach((star, index) => {
                star.addEventListener('mouseover', () => {
                    stars.forEach((s, i) => {
                        s.classList.toggle('active', i <= index);
                    });
                });

                star.addEventListener('click', () => {
                    selectedRating = index + 1;
                    stars.forEach((s, i) => {
                        s.classList.toggle('active', i < selectedRating);
                    });
                    starsContainer.setAttribute('data-selected', selectedRating);
                    document.getElementById('evaluation_' + starsContainer.dataset.rating).value = selectedRating;                    
                    // Marquer comme valide
                    const ratingItem = starsContainer.closest('.rating-item');
                    ratingItem.classList.add('valid');
                });
            });

            starsContainer.addEventListener('mouseleave', () => {
                stars.forEach((s, i) => {
                    s.classList.toggle('active', i < selectedRating);
                });
            });
        });

        // Fonction pour créer des confetti
        function createConfetti() {
            const colors = ['#fbbf24', '#1e3a8a', '#10b981', '#f59e0b'];
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDelay = Math.random() * 2 + 's';
                confetti.style.animationDuration = (Math.random() * 2 + 2) + 's';
                
                if (Math.random() > 0.5) {
                    confetti.style.borderRadius = '50%';
                }
                
                document.body.appendChild(confetti);
                
                // Supprimer le confetti après l'animation
                setTimeout(() => {
                    if (confetti.parentNode) {
                        confetti.parentNode.removeChild(confetti);
                    }
                }, 4000);
            }
        }

        // Gestion des pourboires avec confetti

        // Fonction pour créer des confetti améliorée
        function createConfetti(type = 'normal') {
            const colors = type === 'tip' ? 
                ['#fbbf24', '#f59e0b', '#eab308', '#facc15'] : 
                ['#fbbf24', '#1e3a8a', '#10b981', '#f59e0b'];
            
            const confettiCount = type === 'tip' ? 80 : 50;
            
            for (let i = 0; i < confettiCount; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDelay = Math.random() * 2 + 's';
                confetti.style.animationDuration = (Math.random() * 2 + 2) + 's';
                
                if (type === 'tip') {
                    confetti.style.width = '8px';
                    confetti.style.height = '8px';
                    confetti.innerHTML = '💰';
                    confetti.style.fontSize = '12px';
                    confetti.style.backgroundColor = 'transparent';
                }
                
                if (Math.random() > 0.5) {
                    confetti.style.borderRadius = '50%';
                }
                
                document.body.appendChild(confetti);
                
                // Supprimer le confetti après l'animation
                setTimeout(() => {
                    if (confetti.parentNode) {
                        confetti.parentNode.removeChild(confetti);
                    }
                }, 4000);
            }
        }
        let hasSelectedTip = false;
        
        document.querySelectorAll('.tip-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.tip-btn').forEach(b => b.classList.remove('selected'));
                btn.classList.add('selected');
                
                document.getElementById('pourboire').value = btn.dataset.tip;
                
                const tipAmountSection = document.getElementById('tipAmountSection');
                if (btn.dataset.tip === 'non') {
                    tipAmountSection.classList.add('show');
                    hasSelectedTip = false;
                } else {
                    tipAmountSection.classList.remove('show');
                    if (btn.dataset.tip === 'oui' && !hasSelectedTip) {
                        createConfetti('tip');
                        hasSelectedTip = true;
                    }
                }
            });
        });

        document.querySelectorAll('.tip-option').forEach(option => {
            option.addEventListener('click', () => {
                document.querySelectorAll('.tip-option').forEach(o => o.classList.remove('selected'));
                option.classList.add('selected');
                
                if (option.dataset.tip === 'custom') {
                    const customAmount = prompt('Montant du pourboire (€):');
                    if (customAmount && customAmount > 0) {
                        option.textContent = customAmount + '€';
                        document.getElementById('pourboire').value = customAmount + '€';
                        if (!hasSelectedTip) {
                            createConfetti('tip');
                            hasSelectedTip = true;
                        }
                    }
                } else {
                    document.getElementById('pourboire').value = option.dataset.tip;
                    if (option.dataset.tip !== 'none' && !hasSelectedTip) {
                        createConfetti('tip');
                        hasSelectedTip = true;
                    }
                }
            });
        });

        // Gestion du selfie
        document.getElementById('selfie').addEventListener('change', function() {
            const label = document.querySelector('.selfie-label');
            if (this.files && this.files[0]) {
                label.innerHTML = '✅ Selfie sélectionné !';
                label.style.background = 'rgba(16, 185, 129, 0.3)';
                label.style.borderColor = '#10b981';
            }
        });

       // Gestion du formulaire
        let formSubmitted = false;

        document.getElementById('feedbackForm').addEventListener('submit', (e) => {
            if (formSubmitted) {
                e.preventDefault();
                return;
            }
            
            formSubmitted = true;
            
            // Animation de succès
            const btn = document.querySelector('.submit-btn');
            btn.textContent = 'Envoi en cours...';
            btn.disabled = true;
            
            // Le formulaire va maintenant se soumettre vers formulaire.php
        });

        // Navigation avec la touche Entrée
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && e.target.tagName !== 'TEXTAREA' && e.target.type !== 'submit') {
                e.preventDefault();
                
                // Trouver tous les champs du formulaire
                const formElements = Array.from(document.querySelectorAll('input:not([type="hidden"]), select, textarea'));
                const currentIndex = formElements.indexOf(e.target);
                
                // Passer au champ suivant
                if (currentIndex !== -1 && currentIndex < formElements.length - 1) {
                    const nextElement = formElements[currentIndex + 1];
                    nextElement.focus();
                    
                    // Effet visuel sur le champ suivant
                    nextElement.style.transform = 'scale(1.02)';
                    setTimeout(() => {
                        nextElement.style.transform = 'scale(1)';
                    }, 200);
                }
            }
        });
    </script>
</body>
</html>