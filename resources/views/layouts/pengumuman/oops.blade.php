@extends('layouts.user')
@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Penting</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e8f4f8 0%, #f0f8ff 50%, #e6f3ff 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow-x: hidden;
            position: relative;
        }

        /* Floating decorative elements */
        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 1;
        }

        .shape {
            position: absolute;
            animation: float 6s ease-in-out infinite;
        }

        .shape-1 {
            top: 15%;
            left: 20%;
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #ff9a9e, #fecfef);
            border-radius: 50% 20% 50% 20%;
            animation-delay: 0s;
        }

        .shape-2 {
            top: 25%;
            right: 15%;
            width: 35px;
            height: 35px;
            background: linear-gradient(45deg, #a8edea, #fed6e3);
            border-radius: 20% 50% 20% 50%;
            animation-delay: 2s;
        }

        .shape-3 {
            bottom: 20%;
            left: 15%;
            width: 30px;
            height: 30px;
            background: linear-gradient(45deg, #d299c2, #fef9d7);
            border-radius: 50%;
            animation-delay: 4s;
        }

        .shape-4 {
            top: 60%;
            right: 25%;
            width: 25px;
            height: 25px;
            background: linear-gradient(45deg, #89f7fe, #66a6ff);
            border-radius: 20%;
            animation-delay: 1s;
        }

        .shape-5 {
            bottom: 40%;
            right: 10%;
            width: 20px;
            height: 20px;
            background: linear-gradient(45deg, #ffecd2, #fcb69f);
            border-radius: 50%;
            animation-delay: 3s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            25% { transform: translateY(-15px) rotate(90deg); }
            50% { transform: translateY(-10px) rotate(180deg); }
            75% { transform: translateY(-20px) rotate(270deg); }
        }

        .container {
            text-align: center;
            z-index: 10;
            position: relative;
            max-width: 800px;
            padding: 20px;
        }

        .phone-stack {
            position: relative;
            display: inline-block;
            margin-bottom: 40px;
        }

        .phone {
            width: 200px;
            height: 350px;
            border-radius: 25px;
            position: relative;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 3px solid #6c7ce0;
        }

        .phone-main {
            background: linear-gradient(135deg, #ffc0cb, #ffb3e6);
            z-index: 3;
            position: relative;
        }

        .phone-left {
            background: linear-gradient(135deg, #a8f0c8, #7fefb3);
            position: absolute;
            left: -60px;
            top: 20px;
            z-index: 2;
            transform: rotate(-15deg);
        }

        .phone-right {
            background: linear-gradient(135deg, #b3d9ff, #9bc9ff);
            position: absolute;
            right: -60px;
            top: -20px;
            z-index: 1;
            transform: rotate(15deg);
        }

        .phone-header {
            height: 60px;
            background: rgba(255, 255, 255, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header-dots {
            display: flex;
            gap: 6px;
        }

        .dot {
            width: 8px;
            height: 8px;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
        }

        .phone-content {
            padding: 30px 25px;
            height: calc(100% - 60px);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .announcement-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            font-size: 30px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        .content-lines {
            width: 100%;
            margin-bottom: 20px;
        }

        .line {
            height: 8px;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 4px;
            margin-bottom: 8px;
        }

        .line:nth-child(1) { width: 90%; margin: 0 auto 8px; }
        .line:nth-child(2) { width: 70%; margin: 0 auto 8px; }
        .line:nth-child(3) { width: 85%; margin: 0 auto 8px; }
        .line:nth-child(4) { width: 60%; margin: 0 auto 15px; }
        .line:nth-child(5) { width: 80%; margin: 0 auto 8px; }

        .side-numbers {
            position: absolute;
            font-size: 60px;
            font-weight: bold;
            color: rgba(255, 255, 255, 0.9);
            top: 50%;
            transform: translateY(-50%);
        }

        .number-left {
            left: 30px;
            color: #2d8f5f;
        }

        .number-right {
            right: 30px;
            color: #4a90e2;
        }

        .announcement-text {
            margin-top: 40px;
        }

        .announcement-title {
            font-size: 48px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 15px;
            animation: fadeInUp 1s ease-out;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .announcement-badge {
            display: inline-block;
            background: linear-gradient(135deg, #ff6b6b, #feca57);
            color: white;
            padding: 8px 20px;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 20px;
            animation: fadeInUp 1s ease-out 0.1s both;
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
        }

        .announcement-message {
            font-size: 18px;
            color: #4a5568;
            margin-bottom: 25px;
            line-height: 1.6;
            animation: fadeInUp 1s ease-out 0.2s both;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .announcement-details {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 15px;
            padding: 25px;
            margin: 25px 0;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
            animation: fadeInUp 1s ease-out 0.3s both;
            backdrop-filter: blur(10px);
        }

        .detail-item {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            margin-bottom: 15px;
            font-size: 16px;
            color: #2d3748;
        }

        .detail-item:last-child {
            margin-bottom: 0;
        }

        .detail-icon {
            width: 24px;
            height: 24px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            flex-shrink: 0;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 12px 25px;
            border-radius: 25px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 16px;
            animation: fadeInUp 1s ease-out 0.4s both;
        }

        .btn-primary {
            background: linear-gradient(135deg, #6c7ce0, #8e94f2);
            color: white;
            box-shadow: 0 8px 20px rgba(108, 124, 224, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(108, 124, 224, 0.4);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.9);
            color: #4a5568;
            border: 2px solid #e2e8f0;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
            background: white;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Phone animation */
        .phone-stack {
            animation: phoneFloat 4s ease-in-out infinite;
        }

        @keyframes phoneFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
        }

        .phone-main .content-lines .line {
            animation: contentPulse 2s ease-in-out infinite;
        }

        .phone-main .content-lines .line:nth-child(2) { animation-delay: 0.3s; }
        .phone-main .content-lines .line:nth-child(3) { animation-delay: 0.6s; }
        .phone-main .content-lines .line:nth-child(4) { animation-delay: 0.9s; }
        .phone-main .content-lines .line:nth-child(5) { animation-delay: 1.2s; }

        @keyframes contentPulse {
            0%, 100% { opacity: 0.4; }
            50% { opacity: 0.8; }
        }

        @media (max-width: 768px) {
            .phone {
                width: 160px;
                height: 280px;
            }
            
            .phone-left,
            .phone-right {
                width: 160px;
                height: 280px;
            }
            
            .side-numbers {
                font-size: 40px;
            }
            
            .announcement-title {
                font-size: 36px;
            }
            
            .announcement-message {
                font-size: 16px;
                padding: 0 20px;
            }

            .announcement-details {
                padding: 20px;
                margin: 20px 10px;
            }

            .action-buttons {
                flex-direction: column;
                align-items: center;
            }

            .btn {
                width: 200px;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .phone {
                width: 140px;
                height: 240px;
            }
            
            .phone-left,
            .phone-right {
                width: 140px;
                height: 240px;
            }
            
            .side-numbers {
                font-size: 30px;
            }
            
            .number-left {
                left: 15px;
            }
            
            .number-right {
                right: 15px;
            }
            
            .announcement-title {
                font-size: 32px;
            }

            .container {
                padding: 15px;
            }
        }
    </style>
    
</head>
<body>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
        <div class="shape shape-5"></div>
    </div>

    <div class="container">
        <div class="phone-stack">
            <!-- Left Phone -->
            <div class="phone phone-left">
                <div class="phone-header">
                    <div class="header-dots">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                </div>
                <div class="phone-content">
                    <div class="side-numbers number-left">📢</div>
                </div>
            </div>

            <!-- Right Phone -->
            <div class="phone phone-right">
                <div class="phone-header">
                    <div class="header-dots">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                </div>
                <div class="phone-content">
                    <div class="side-numbers number-right">📋</div>
                </div>
            </div>

            <!-- Main Phone -->
            <div class="phone phone-main">
                <div class="phone-header">
                    <div class="header-dots">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                    </div>
                </div>
                <div class="phone-content">
                    <div class="announcement-icon">📣</div>
                    <div class="content-lines">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="error-text">
            <h1 class="oops-title">Oops...</h1>
            <p class="error-message">Tidak ada pengumuman ditemukan.</p>
        </div>
    </div>

    <script>
        // Add interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Add click animation to phones
            const phones = document.querySelectorAll('.phone');
            phones.forEach(phone => {
                phone.addEventListener('click', function() {
                    this.style.transform = 'scale(0.95)';
                    setTimeout(() => {
                        this.style.transform = '';
                    }, 150);
                });
            });

            // Add floating animation to shapes with mouse movement
            document.addEventListener('mousemove', function(e) {
                const shapes = document.querySelectorAll('.shape');
                const mouseX = e.clientX / window.innerWidth;
                const mouseY = e.clientY / window.innerHeight;

                shapes.forEach((shape, index) => {
                    const speed = (index + 1) * 0.5;
                    const x = (mouseX - 0.5) * speed * 20;
                    const y = (mouseY - 0.5) * speed * 20;
                    
                    shape.style.transform = `translate(${x}px, ${y}px)`;
                });
            });

            // Add keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    history.back();
                }
            });

            // Auto-update time
            updateTime();
            setInterval(updateTime, 1000);
        });

        function showDetails() {
            alert('Detail lengkap pengumuman:\n\n' +
                  '• Sistem akan tidak dapat diakses selama maintenance\n' +
                  '• Data pengguna aman dan tidak akan hilang\n' +
                  '• Setelah maintenance, sistem akan lebih stabil\n' +
                  '• Update fitur baru akan tersedia\n\n' +
                  'Terima kasih atas pengertiannya! 🙏');
        }

        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID');
            // You can display current time somewhere if needed
        }

        // Add notification sound effect (optional)
        function playNotificationSound() {
            // Create audio context for notification sound
            const audioContext = new (window.AudioContext || window.webkitAudioContext)();
            const oscillator = audioContext.createOscillator();
            const gainNode = audioContext.createGain();
            
            oscillator.connect(gainNode);
            gainNode.connect(audioContext.destination);
            
            oscillator.frequency.setValueAtTime(800, audioContext.currentTime);
            oscillator.frequency.setValueAtTime(600, audioContext.currentTime + 0.1);
            
            gainNode.gain.setValueAtTime(0.1, audioContext.currentTime);
            gainNode.gain.exponentialRampToValueAtTime(0.01, audioContext.currentTime + 0.2);
            
            oscillator.start(audioContext.currentTime);
            oscillator.stop(audioContext.currentTime + 0.2);
        }

        // Play notification sound on page load
        setTimeout(() => {
            try {
                playNotificationSound();
            } catch (error) {
                console.log('Audio not supported');
            }
        }, 1000);
    </script>
</body>
</html>
@endsection