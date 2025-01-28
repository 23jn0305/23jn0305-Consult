<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>株式会社Jecコンサルティング</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" defer></script>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      line-height: 1.6;
    }
    .hero {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://source.unsplash.com/1600x900/?business') no-repeat center center/cover;
      color: white;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }
    .hero h1 {
      font-size: 3rem;
      font-weight: bold;
    }
    .hero p {
      font-size: 1.2rem;
    }
    .contact-form input, .contact-form textarea {
      margin-bottom: 1rem;
    }
    footer {
      background-color: #333;
      color: white;
      padding: 1rem 0;
      text-align: center;
    }
    footer a {
      color: #ffc107;
      text-decoration: none;
    }
  </style>
</head>
<body>

  <!-- ヒーローセクション -->
  <header class="hero">
    <div class="container">
      <h1>株式会社Jecコンサルティング</h1>
      <p>未来へのビジネス戦略をあなたと共に。</p>
      <a href="#services" class="btn btn-warning btn-lg mt-3">サービスを見る</a>
    </div>
  </header>

  <!-- サービスセクション -->
  <section id="services" class="py-5">
    <div class="container text-center">
      <h2 class="mb-4">私たちのサービス</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">経営コンサルティング</h5>
              <p class="card-text">市場分析から戦略立案まで、最適なソリューションをご提案します。</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">ITソリューション</h5>
              <p class="card-text">最新のテクノロジーを活用し、業務効率化をサポートします。</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 shadow-sm">
            <div class="card-body">
              <h5 class="card-title">人材育成</h5>
              <p class="card-text">次世代リーダーの育成を目指し、質の高い研修を提供します。</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- お問い合わせフォーム -->
  <section id="contact" class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center mb-4">お問い合わせ</h2>
      <form action="" method="POST" class="contact-form mx-auto" style="max-width: 600px;">
        <div class="mb-3">
          <label for="name" class="form-label">お名前</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="お名前を入力してください" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">メールアドレス</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="メールアドレスを入力してください" required>
        </div>
        <div class="mb-3">
          <label for="message" class="form-label">メッセージ</label>
          <textarea class="form-control" id="message" name="message" rows="5" placeholder="お問い合わせ内容を入力してください" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">送信する</button>
      </form>
      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // POSTデータを取得
            $name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
            $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
            $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'UTF-8');

            // CSVファイルのパス
            $csvFile = "inquiries.csv";

            // CSVのデータを作成
            $data = [
                date("Y-m-d H:i:s"), // 現在時刻
                $name,
                $email,
                $message
            ];

            // CSVに書き込む処理
            $file = fopen($csvFile, "a"); // 追記モードで開く
            if ($file) {
                fputcsv($file, $data); // データを書き込む
                fclose($file); // ファイルを閉じる
                echo '<div class="alert alert-success mt-4">お問い合わせありがとうございます。内容を保存しました。</div>';
            } else {
                echo '<div class="alert alert-danger mt-4">保存に失敗しました。再度お試しください。</div>';
            }
        }
      ?>
    </div>
  </section>

  <!-- フッター -->
  <footer>
    <p>&copy; 2025 株式会社Jecコンサルティング | <a href="#contact">お問い合わせ</a></p>
  </footer>

</body>
</html>
