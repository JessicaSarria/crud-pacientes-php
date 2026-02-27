-- CREAR TABLA PRODUCTOS
CREATE TABLE productos (
    id_fabricante TEXT,
    id_producto TEXT,
    descripcion TEXT,
    precio REAL,
    existencias INTEGER
);

-- INSERTAR DATOS
INSERT INTO productos VALUES ('Aci','41001','Aguja',58,227);
INSERT INTO productos VALUES ('Aci','41002','Micropore',80,150);
INSERT INTO productos VALUES ('Aci','41003','Gasa',112,80);
INSERT INTO productos VALUES ('Aci','41004','Equipo macrogoteo',110,50);
INSERT INTO productos VALUES ('Bic','41003','Curas',120,20);
INSERT INTO productos VALUES ('Inc','41089','Canaleta',500,30);
INSERT INTO productos VALUES ('Qsa','Xk47','Compresa',150,200);
INSERT INTO productos VALUES ('Bic','Xk47','Compresa',200,200);

-- LISTADO CON IVA
SELECT id_fabricante,id_producto,descripcion,precio,precio*1.10 AS precio_con_iva
FROM productos;

-- TOTAL EXISTENCIAS POR PRODUCTO
SELECT descripcion, SUM(existencias) AS total_existencias
FROM productos
GROUP BY descripcion;

-- PROMEDIO PRECIO POR FABRICANTE
SELECT id_fabricante, AVG(precio) AS promedio_precio
FROM productos
GROUP BY id_fabricante;

-- PRODUCTO CON MAYOR PRECIO
SELECT *
FROM productos
ORDER BY precio DESC
LIMIT 1;

-- AGREGAR PEDIDO DE 500 CURAS DE BIC
UPDATE productos
SET existencias = existencias + 500
WHERE descripcion = 'Curas' AND id_fabricante = 'Bic';

-- ELIMINAR PRODUCTOS DEL FABRICANTE OSA
DELETE FROM productos
WHERE id_fabricante = 'Osa';