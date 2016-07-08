delimiter $$
drop procedure if exists up_cargarPedidoVenta$$
CREATE procedure up_cargarPedidoVenta()
BEGIN

declare idPedido int;
declare ide int;
declare cod varchar(20);
declare idTipoPedido int;
declare idInterlocutor int;
declare cantSinStock int default 0;
declare idPedidoDetalle int;
declare idProducto int(11);
declare cantProducto int(11);
declare cantProd int(11);
declare montoOperacion double default 0;
declare precio double;
declare pedidoId int;
declare flag int;

declare leer_pedidos cursor for
select id, tipo_pedido_id, interlocutor_comercial_id from pedido;


declare leer_detalle cursor for 
select id, producto_id, cantidad, pedido_id from pedido_detalle;


DECLARE CONTINUE HANDLER FOR NOT FOUND SET @hecho = TRUE;

open leer_pedidos;

loop1: loop

fetch leer_pedidos into idPedido, idTipoPedido, idInterlocutor;


IF @hecho THEN
LEAVE loop1;
END IF;


open leer_detalle;

loop2: loop

fetch leer_detalle into idPedidoDetalle, idProducto, cantProd, pedidoId;

IF @hecho THEN
LEAVE loop2;
END IF;



if pedidoId = idPedido then
set cantProducto = (select stock from catalogo_producto where id=idProducto);
if cantProducto > 0 then
set precio = (select precio_vta from catalogo_producto where id=idProducto);
if cantProducto > cantProd then
	update catalogo_producto set stock = (stock - cantProd) where producto_id = idProducto;
	update pedido_detalle set cantidad_at=cantProd where id=idPedidoDetalle;
else
	if cantProducto = cantProd then
		update catalogo_producto set stock = 0 where producto_id = idProducto;
update pedido_detalle set cantidad_at=cantProd where id=idPedidoDetalle;
	else
		set cantProd = cantProducto;
        update catalogo_producto set stock= 0 where producto_id = idProducto;
update pedido_detalle set cantidad_at=cantProd where id=idPedidoDetalle;
    end if;
end if;
set montoOperacion = montoOperacion + (cantProd*precio); 
set flag=1;
end if;

end if;

end loop loop2;

if flag=1 then

set ide=(select max(id) + 1 from venta);
set cod=(select concat('VNT',ide) from venta limit 1);

insert into venta
(id,despacho_id, pedido_id, codigo_venta, monto_venta, estado, observacion, fecha_venta)
values
(ide,'', idPedido,cod
, montoOperacion, 1, 'Enviado',curdate());
end if;
set montoOperacion=0;
END LOOP loop1;


close leer_detalle;
close leer_pedidos;

END$$

delimiter ;