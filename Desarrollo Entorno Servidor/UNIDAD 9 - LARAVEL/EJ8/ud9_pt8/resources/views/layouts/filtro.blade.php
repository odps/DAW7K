<form action="{{ route('cuenta_filtro') }}" method="get">
    <label for="code">Filtrar por <strong>codigo</strong>:</label>
    <input type="text" name="codigo" required>
    <br>
    <label for="saldo">Filtrar por <strong>saldo</strong>:</label>
    <input type="number" name="saldo" placeholder="0" value="0">
    <br>
    <button type="submit" name="filtro" value="and">Buscar</button>
    <button type="submit" name="filtro" value="or">Buscar OR </button>
</form>