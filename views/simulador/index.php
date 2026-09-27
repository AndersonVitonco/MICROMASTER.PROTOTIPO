<div class="main">
    <div class="topbar">
      <div class="page-title" id="topbar-title">Simulador</div>
      <div class="topbar-right">
        <div class="topbar-date" id="topbar-date"></div>
      </div>
    </div>
    <div class="content">
      <div class="page active" id="page-simulador">
        <div class="calc-grid">
          <div class="calc-panel">
            <h3><span class="section-icon">📈</span>Configuraci&oacute;n</h3>
            <div class="field" style="margin-bottom:14px">
              <label>Receta</label>
              <select id="sim-receta" onchange="simularDemo()">
                <option value="">Selecciona receta</option>
                <?php if (!empty($recetasDisponibles)): ?>
                  <?php foreach ($recetasDisponibles as $receta): ?>
                    <?php $costoLimpio = str_replace(['$', ' '], '', $receta['rendimiento']); $costoNumero = floatval($costoLimpio); ?>
                    <option value="<?php echo $costoNumero; ?>">
                      <?php echo htmlspecialchars($receta['nombre']); ?> &mdash; <?php echo htmlspecialchars($receta['rendimiento']); ?>/u
                    </option>
                  <?php endforeach; ?>
                <?php else: ?>
                  <option value="1.85">Pan Franc&eacute;s &mdash; $1.85/u</option>
                  <option value="6.20">Torta de Chocolate &mdash; $6.20/u</option>
                <?php endif; ?>
              </select>
            </div>
            <div class="field" style="margin-bottom:14px">
              <label>Cantidad (unidades)</label>
              <input type="number" id="sim-cantidad" value="100" oninput="simularDemo()">
            </div>
            <div class="field" style="margin-bottom:20px">
              <label>% Variaci&oacute;n de precio de insumos</label>
              <input type="number" id="sim-variacion" value="0" step="1" oninput="simularDemo()">
            </div>
            <button class="btn btn-primary" style="width:100%;margin-bottom:8px" onclick="simularDemo()">🔄 Simular</button>
            <button class="btn btn-outline" style="width:100%" onclick="resetSim()">Resetear</button>
          </div>
          <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;align-content:start">
            <div class="calc-panel" style="text-align:center">
              <div class="calc-label-sm">Costo Original</div>
              <div class="calc-result" id="sim-original" style="color:var(--text-muted)">$0</div>
              <div class="calc-label-sm" id="sim-orig-u">$0 por unidad</div>
            </div>
            <div class="calc-panel" style="text-align:center">
              <div class="calc-label-sm">Costo Simulado</div>
              <div class="calc-result" id="sim-simulado">$0</div>
              <div class="calc-label-sm" id="sim-sim-u">$0 por unidad</div>
            </div>
            <div class="calc-panel" style="text-align:center">
              <div class="calc-label-sm">Diferencia</div>
              <div class="calc-result" id="sim-diferencia" style="font-size:28px">$0</div>
            </div>
            <div class="calc-panel" style="text-align:center">
              <div class="calc-label-sm">Variaci&oacute;n %</div>
              <div class="calc-result" id="sim-pct" style="font-size:28px">0%</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
