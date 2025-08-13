<table class="adm-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên sản phẩm</th>
          <th>Loại</th>
          <th>Giá</th>
          <th>Tiêu đề</th>
          <th>Hình ảnh</th>
          <th>Hành động</th>
        </tr>
      </thead>
      <?php foreach ($data as $value): ?>
      <tbody>
        <tr>
          <td><?= $value["product_id"] ?></td>
          <td><?= $value["name"] ?></td>
          <td><?= $value["categoriesName"] ?></td>
          <td><?= $value["price"] ?></td>
          <td><?= $value["description"] ?></td>
          <td><img src="<?= htmlspecialchars($value["image_url"] ?? '') ?>" alt="sp" width="100"></td>
          </tbody>
      <?php endforeach; ?>
    </table>