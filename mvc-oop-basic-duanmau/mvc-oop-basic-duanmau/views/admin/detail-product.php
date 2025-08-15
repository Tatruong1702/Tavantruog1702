<table class="adm-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tên sản phẩm</th>
          <th>Loại</th>
          <th>Giá</th>
          <th>Tiêu đề</th>
          <th>Hình ảnh</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?= htmlspecialchars($data["product_id"]) ?></td>
          <td><?= htmlspecialchars($data["name"]) ?></td>
          <td><?= htmlspecialchars($data["categoryName"]) ?></td>
          <td><?= htmlspecialchars($data["price"]) ?></td>
          <td><?= htmlspecialchars($data["description"]) ?></td> 
          <td><img src="<?= htmlspecialchars($data["image_url"] ?? '') ?>" alt="sp" width="100"></td>
          </tbody>
    </table>