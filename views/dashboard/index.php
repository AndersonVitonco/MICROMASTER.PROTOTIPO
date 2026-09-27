<div class="main">
  <div class="topbar">
    <div class="page-title" id="topbar-title">Inicio</div>
    <div class="topbar-right">
      <div class="topbar-date" id="topbar-date"></div>
    </div>
  </div>
  <div class="content">
    <div class="page active" id="page-dashboard">
      <div class="stats-row">
        <div class="stat-card"><div class="stat-label">En Producci&oacute;n Hoy</div><div class="stat-value blue">3</div><div class="stat-sub">lotes activos</div></div>
        <div class="stat-card"><div class="stat-label">Planificados</div><div class="stat-value green">5</div><div class="stat-sub">&oacute;rdenes de producci&oacute;n</div></div>
        <div class="stat-card"><div class="stat-label">Insumos Cr&iacute;ticos</div><div class="stat-value red"><?php echo count($insumosCriticos); ?></div><div class="stat-sub">bajo stock m&iacute;nimo</div></div>
        <div class="stat-card"><div class="stat-label">Por Vencer</div><div class="stat-value amber">3</div><div class="stat-sub">en los pr&oacute;ximos 15 d&iacute;as</div></div>
        <div class="stat-card"><div class="stat-label">Valor Inventario</div><div class="stat-value green">$<?php echo number_format($valorInventario, 0); ?></div><div class="stat-sub">valorizaci&oacute;n actual</div></div>
        <div class="stat-card"><div class="stat-label">Despachos Pend.</div><div class="stat-value"><?php echo $pedidosPendientes; ?></div><div class="stat-sub">pendiente de salida</div></div>
      </div>
      <div class="section-divider"><h3>🏭 Producciones en Proceso</h3></div>
      <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(280px,1fr));gap:14px;margin-bottom:24px">
        <?php if (!empty($lotesEnProceso)): ?>
          <?php foreach ($lotesEnProceso as $lote): ?>
            <?php $esCompletado = $lote['estado'] === 'Completado'; $badgeClass = $esCompletado ? 'badge-green' : 'badge-blue'; ?>
            <div style="background:var(--white);border:1.5px solid var(--border);border-radius:14px;padding:20px">
              <div style="display:flex;justify-content:space-between;align-items:flex-start;margin-bottom:14px">
                <div>
                  <div style="font-weight:800;font-size:15px;color:var(--black)"><?php echo htmlspecialchars($lote['producto']); ?> &mdash; <?php echo htmlspecialchars($lote['codigo_op']); ?></div>
                  <div style="font-size:12px;color:var(--text-muted);margin-top:2px"><?php echo htmlspecialchars($lote['categoria']); ?> &middot; <?php echo htmlspecialchars($lote['horario_fecha']); ?></div>
                </div>
                <span class="badge <?php echo $badgeClass; ?>"><?php echo htmlspecialchars($lote['estado']); ?></span>
              </div>
              <div style="background:var(--bg);border-radius:8px;overflow:hidden;height:8px;margin-bottom:8px">
                <div style="height:100%;width:<?php echo $lote['progreso']; ?>%;<?php echo $esCompletado ? 'background:var(--teal)' : 'background:var(--primary)'; ?>;border-radius:8px;transition:width 0.5s"></div>
              </div>
              <div style="display:flex;justify-content:space-between;font-size:11px;color:var(--text-muted)">
                <span>Progreso: <?php echo $lote['progreso']; ?>% <?php echo $esCompletado ? '✅' : ''; ?></span>
                <span>Rendimiento: <?php echo htmlspecialchars($lote['cantidad']); ?></span>
              </div>
              <div style="margin-top:12px;padding-top:12px;border-top:1px solid var(--bg);font-size:12px;color:var(--text-muted)">
                Insumos: <?php echo htmlspecialchars($lote['insumos_necesarios']); ?>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div style="grid-column:1/-1;padding:20px;text-align:center;background:var(--white);border-radius:14px;border:1.5px solid var(--border);color:var(--text-muted);font-size:13px;">No hay lotes en proceso hoy.</div>
        <?php endif; ?>
      </div>
      <div class="section-divider"><h3><span class="section-icon">📅</span>Planificaci&oacute;n &mdash; Pr&oacute;ximos lotes</h3></div>
      <div class="table-wrap" style="margin-bottom:24px">
        <table>
          <thead><tr><th>Orden</th><th>Producto</th><th>Categor&iacute;a</th><th>Cantidad</th><th>Insumos necesarios</th><th>Fecha planificada</th><th>Estado</th></tr></thead>
          <tbody>
            <?php if (!empty($lotesPlanificados)): ?>
              <?php foreach ($lotesPlanificados as $plan): ?>
                <?php $badgeStyle = 'badge-amber'; if ($plan['estado'] === 'Insumo cr&iacute;tico') $badgeStyle = 'badge-red'; if ($plan['estado'] === 'Pendiente aprobaci&oacute;n') $badgeStyle = 'badge-gray'; if ($plan['estado'] === 'Bebidas') $badgeStyle = 'badge-green'; ?>
                <tr>
                  <td><span style="font-family:DM Mono,monospace;font-weight:700"><?php echo htmlspecialchars($plan['codigo_op']); ?></span></td>
                  <td><strong><?php echo htmlspecialchars($plan['producto']); ?></strong></td>
                  <td><span class="badge badge-gray"><?php echo htmlspecialchars($plan['categoria']); ?></span></td>
                  <td><?php echo htmlspecialchars($plan['cantidad']); ?></td>
                  <td style="font-size:12px;color:var(--text-muted)"><?php echo htmlspecialchars($plan['insumos_necesarios']); ?></td>
                  <td style="font-size:12px"><?php echo htmlspecialchars($plan['horario_fecha']); ?></td>
                  <td><span class="badge <?php echo $badgeStyle; ?>"><?php echo htmlspecialchars($plan['estado']); ?></span></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="7" style="padding:20px;text-align:center;color:var(--text-muted);font-size:13px;">No hay lotes planificados en el cronograma.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:24px">
        <div style="background:var(--white);border:1.5px solid #f5cccc;border-radius:14px;padding:20px">
          <div style="display:flex;align-items:center;gap:8px;margin-bottom:14px">
            <span style="font-size:18px">🚨</span>
            <h3 style="font-family:Fraunces,serif;font-size:16px;font-weight:900;color:var(--red)">Insumos Cr&iacute;ticos</h3>
          </div>
          <div style="display:flex;flex-direction:column;gap:10px">
            <?php if (!empty($insumosCriticos)): ?>
              <?php foreach ($insumosCriticos as $critico): ?>
                <?php $esAgotado = floatval($critico['cantidad']) == 0; $colorTexto = $esAgotado ? 'var(--red)' : 'var(--amber)'; $textoEstado = $esAgotado ? 'AGOTADO' : 'Bajo Stock'; ?>
                <div style="display:flex;justify-content:space-between;align-items:center;padding:10px;background:#fdf5f5;border:1px solid #f5cccc;border-radius:8px">
                  <div>
                    <p style="font-weight:700;font-size:13px;color:var(--black)"><?php echo htmlspecialchars($critico['nombre']); ?></p>
                    <p style="font-size:11px;color:<?php echo $colorTexto; ?>">Stock: <?php echo htmlspecialchars($critico['cantidad']) . ' ' . htmlspecialchars($critico['unidad']); ?> &mdash; <?php echo $textoEstado; ?></p>
                  </div>
                  <a href="index.php?controller=inventario" class="btn btn-sm" style="background:var(--red);color:#fff;border-color:var(--red);text-decoration:none;display:inline-flex;align-items:center;">Reabastecer</a>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <div style="padding:16px;text-align:center;background:#f0faf5;border:1px solid #b6e8cf;border-radius:8px;color:#14532d;font-family:'DM Sans',sans-serif;font-size:13px;font-weight:600;">✅ Todo el inventario se encuentra al d&iacute;a.</div>
            <?php endif; ?>
          </div>
        </div>
        <div style="background:var(--white);border:1.5px solid #f5e8cc;border-radius:14px;padding:20px">
          <div style="display:flex;align-items:center;gap:8px;margin-bottom:14px">
            <span style="font-size:18px">⏰</span>
            <h3 style="font-family:Fraunces,serif;font-size:16px;font-weight:900;color:var(--amber)">Pr&oacute;ximos a Vencer</h3>
          </div>
          <div style="display:flex;flex-direction:column;gap:10px">
            <div style="display:flex;justify-content:space-between;align-items:center;padding:10px;background:#fdf9f0;border-radius:8px">
              <div><p style="font-weight:700;font-size:13px;color:var(--black)">Pollo entero</p><p style="font-size:11px;color:var(--red)">Vence: 2026-05-28 &mdash; &iexcl;6 d&iacute;as!</p></div>
              <span class="badge badge-red">Urgente</span>
            </div>
            <div style="display:flex;justify-content:space-between;align-items:center;padding:10px;background:#fdf9f0;border-radius:8px">
              <div><p style="font-weight:700;font-size:13px;color:var(--black)">Zanahoria</p><p style="font-size:11px;color:var(--amber)">Vence: 2026-06-07 &mdash; 16 d&iacute;as</p></div>
              <span class="badge badge-amber">Atenci&oacute;n</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
