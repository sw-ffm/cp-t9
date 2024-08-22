<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CN T9</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
</head>

<body>
  <h1>CN T9 Search</h1>
  <form method="post">
    <label for="numbers">T9-Search-Form</label>
    <input type="number" name="numbers" id="numbers" value="<?php print htmlspecialchars($_POST["numbers"]) ?? "";?>">
    <button type="submit">GO</button>
  </form>
  
  <?php if(isset($result)): ?>
    <table>
        <thead>
            <tr>
                <td>Surname</td>
                <td>Name</td>
                <td>Number</td>
            </tr>
        </thead>
        <tbody>
        <?php foreach($result as $row): ?>
            <tr>
                <td><?php print htmlspecialchars($row["surname"]); ?></td>
                <td><?php print htmlspecialchars($row["name"]); ?></td>
                <td><?php print htmlspecialchars($row["phone_number"]); ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
  <?php endif ?>

  <hr>
  <h2>Insert new addressbook entry:</h2>
  <?php if(isset($success)): ?>
    <?php echo $success; ?>
  <?php endif ?>
  <form method="post">
    <input type="hidden" name="newentry" value="true">
    <label for="surname">Surname</label>
    <input type="text" name="surname" id="surname" required>
    <label for="name">Name</label>
    <input type="text" name="name" id="name" required>
    <label for="phone_number">Phone number</label>
    <input type="text" name="phone_number" id="phone_number" required>
    <button type="submit">GO</button>
  </form>

</body>

</html>