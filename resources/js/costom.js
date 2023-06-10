document.addEventListener('DOMContentLoaded', function () {
  var form = document.getElementById('create-form');
  form.addEventListener('submit', function (event) {
    event.preventDefault(); // デフォルトの送信動作をキャンセル
    // ここで必要な処理を追加

    // 例: Ajaxを使用してフォームを非同期で送信する場合
    var formData = new FormData(form);
    fetch(form.action, {
      method: 'POST',
      body: formData
    })
      .then(function (response) {
        if (response.ok) {
          return response.json();
        }
        throw new Error('Network response was not ok.');
      })
      .then(function (data) {
        // 成功時の処理
        console.log(data);
      })
      .catch(function (error) {
        // エラー時の処理
        console.log(error);
      });
  });
});
