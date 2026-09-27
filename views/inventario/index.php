<div class="main">
  <div class="topbar">
    <div class="page-title" id="topbar-title">Inventario</div>
    <div class="topbar-right"><div class="topbar-date" id="topbar-date"></div></div>
  </div>
  <div class="content">
    <div class="page active" id="page-inventario">
      <div class="stats-row">
        <div class="stat-card"><div class="stat-label">Total Insumos</div><div class="stat-value"><?php echo $totalInsumos; ?></div><div class="stat-sub">en sistema</div></div>
        <div class="stat-card"><div class="stat-label">Disponibles</div><div class="stat-value green"><?php echo $disponibles; ?></div><div class="stat-sub">En stock</div></div>
        <div class="stat-card"><div class="stat-label">Stock Bajo</div><div class="stat-value amber"><?php echo $stockBajo; ?></div><div class="stat-sub">bajo m&iacute;nimo</div></div>
        <div class="stat-card"><div class="stat-label">Agotados</div><div class="stat-value red"><?php echo $agotados; ?></div><div class="stat-sub">sin stock</div></div>
        <div class="stat-card"><div class="stat-label">Valor Total</div><div class="stat-value green">$<?php echo number_format($valorTotalInventario, 0, ',', '.'); ?></div><div class="stat-sub">inventario</div></div>
      </div>
      <div class="toolbar">
        <div class="search-box"><span class="icon-inline light">🔍</span><input type="text" placeholder="Buscar insumo..."></div>
        <select class="filter-select"><option>Todas las categor&iacute;as</option><option>L&aacute;cteos</option><option>Cereales</option><option>Prote&iacute;nas</option><option>Vegetales</option><option>Bebidas</option></select>
        <select class="filter-select"><option>Todos los estados</option><option>Disponible</option><option>Bajo stock</option><option>Agotado</option></select>
        <button class="btn btn-primary" onclick="openModal('modal-inv')">+ Agregar Insumo</button>
      </div>
      <div class="table-wrap">
        <table>
          <thead><tr><th>Nombre</th><th>Categor&iacute;a</th><th>Stock</th><th>Precio/U</th><th>Vencimiento</th><th>Estado</th><th>Acciones</th></tr></thead>
          <tbody>
            <?php if (!empty($listaInsumos)): ?>
              <?php foreach ($listaInsumos as $insumo): ?>
                <?php $cantidad = floatval($insumo['cantidad']); if ($cantidad == 0) { $badgeBg='#fee2e2'; $badgeColor='#b91c1c'; $barColor='bar-red'; $estadoTexto='Agotado'; $porcentajeBarra=0; } elseif ($cantidad < 20) { $badgeBg='#ffedd5'; $badgeColor='#c2410c'; $barColor='bar-amber'; $estadoTexto='Bajo Stock'; $porcentajeBarra=20; } else { $badgeBg='#dcfce7'; $badgeColor='#15803d'; $barColor='bar-green'; $estadoTexto='Disponible'; $porcentajeBarra=min(100,intval(($cantidad/120)*100)); } ?>
                <tr style="border-bottom:1px solid var(--border);">
                  <td style="padding:14px 16px;font-family:'DM Sans',sans-serif;font-size:13px;font-weight:600;color:#1e293b;text-align:left;"><strong><?php echo htmlspecialchars($insumo['nombre']); ?></strong></td>
                  <td style="padding:14px 16px;text-align:left;"><span class="badge badge-blue"><?php echo htmlspecialchars($insumo['categoria']); ?></span></td>
                  <td style="padding:14px 16px;text-align:left;"><div class="bar-wrap"><div class="bar-bg"><div class="bar-fill <?php echo $barColor; ?>" style="width:<?php echo $porcentajeBarra; ?>%"></div></div><span style="font-size:12px;color:var(--text-muted)"><?php echo htmlspecialchars($insumo['cantidad']) . ' ' . htmlspecialchars($insumo['unidad']); ?></span></div></td>
                  <td style="padding:14px 16px;font-family:'DM Mono',monospace;font-size:12px;text-align:left;color:var(--text);">$0.85</td>
                  <td style="padding:14px 16px;font-size:12px;text-align:left;color:var(--text-muted);">2026-12-01</td>
                  <td style="padding:14px 16px;text-align:left;"><span style="display:inline-block;padding:4px 10px;background:<?php echo $badgeBg; ?>;color:<?php echo $badgeColor; ?>;border-radius:6px;font-family:'DM Sans',sans-serif;font-weight:700;font-size:11px;text-transform:uppercase;letter-spacing:0.5px;"><?php echo $estadoTexto; ?></span></td>
                  <td style="padding:14px 16px;text-align:left;"><div class="actions"><button class="btn-icon" onclick="verInsumoFicha(this.closest('tr'),true)">✏️</button><button class="btn-icon" onclick="verInsumoFicha(this.closest('tr'),false)">👁️</button><button class="btn-icon danger" onclick="eliminarInsumoReal(<?php echo $insumo['id_insumo']; ?>)">🗑️</button></div></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr><td colspan="7" style="padding:30px;text-align:center;color:var(--text-muted);font-family:'DM Sans',sans-serif;font-size:14px;">No hay insumos registrados en la base de datos.</td></tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
