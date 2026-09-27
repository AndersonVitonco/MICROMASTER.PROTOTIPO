<div class="main">
    <div class="topbar">
      <div class="page-title" id="topbar-title">Calculadora</div>
      <div class="topbar-right">
        <div class="topbar-date" id="topbar-date"></div>
      </div>
    </div>
    <div class="content">
      <div class="page active" id="page-calculadora">
        <div class="calc-grid">
          <div class="calc-panel">
            <h3><span class="section-icon">⚙️</span>Configuraci&oacute;n</h3>
             <div class="field" style="margin-bottom:14px">
              <label>Receta / Producto</label>
              <select id="calc-receta" onchange="calcularDemo()">
                <option value="">Selecciona una receta</option>
                <?php if (!empty($recetasDisponibles)): ?>
                  <?php foreach ($recetasDisponibles as $rec): ?>
                    <option value="1.85"><?php echo htmlspecialchars($rec['nombre']); ?></option>
                  <?php endforeach; ?>
                <?php else: ?>
                  <option value="1.85">Pan Franc&eacute;s Est&aacute;ndar &mdash; $1.85/u</option>
                <?php endif; ?>
              </select>
            </div>
            <div class="field" style="margin-bottom:20px">
              <label>Cantidad a producir (unidades)</label>
              <input type="number" id="calc-cantidad" value="100" min="1" oninput="calcularDemo()">
            </div>
            <button class="btn btn-primary" style="width:100%" onclick="calcularDemo()"><span class="icon-inline small">🧮</span>Calcular</button>
          </div>
          <div>
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:14px">
              <div class="calc-panel" style="text-align:center">
                <div class="calc-label-sm">Costo Total</div>
                <div class="calc-result" id="calc-total">$0</div>
                <div class="calc-label-sm">producci&oacute;n completa</div>
              </div>
              <div class="calc-panel" style="text-align:center">
                <div class="calc-label-sm">Costo Unitario</div>
                <div class="calc-result" id="calc-unitario" style="color:var(--teal)">$0</div>
                <div class="calc-label-sm">por unidad</div>
              </div>
            </div>
            <div class="calc-panel">
              <h3><span class="section-icon">📋</span>Desglose de Insumos</h3>
              <div id="calc-desglose">
                <div style="color:var(--text-muted);font-size:13px;padding:20px 0;text-align:center">Selecciona una receta para ver el desglose</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
