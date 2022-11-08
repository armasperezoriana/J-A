DROP TRIGGER IF EXISTS after_update_dolar;
DELIMITER $$
CREATE TRIGGER after_update_dolar
 AFTER UPDATE ON dolar
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
values(   
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Dolar"),
    CONCAT("Valor_actual: ", NEW.valor_actual)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_insert_usuarios;
DELIMITER $$
CREATE TRIGGER after_insert_usuarios
 AFTER INSERT ON usuarios
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Usuarios"),
    CONCAT("Cedula_trabajador: ", NEW.cedula_trabajador)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_update_usuarios;
DELIMITER $$
CREATE TRIGGER after_update_usuarios
 AFTER UPDATE ON usuarios
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Usuarios"),
    CONCAT("Cedula_trabajador: ", NEW.cedula_trabajador)
);
END;
$$
DELIMITER ;


DROP TRIGGER IF EXISTS after_insert_trabajadores;
DELIMITER $$
CREATE TRIGGER after_insert_trabajadores
 AFTER INSERT ON trabajadores
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Trabajadores"),
    CONCAT("Cedula_trabajador: ", NEW.cedula)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_update_trabajadores;
DELIMITER $$
CREATE TRIGGER after_update_trabajadores
 AFTER UPDATE ON trabajadores
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Trabajadores"),
    CONCAT("Cedula_trabajador: ", NEW.cedula)
);
END;
$$
DELIMITER ;


DROP TRIGGER IF EXISTS after_insert_cargo;
DELIMITER $$
CREATE TRIGGER after_insert_cargo
 AFTER INSERT ON cargo
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Cargo"),
    CONCAT("Nombre_cargo: ", NEW.nombre_cargo)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_update_cargo;
DELIMITER $$
CREATE TRIGGER after_update_cargo
 AFTER UPDATE ON cargo
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Cargo"),
    CONCAT("Nombre_cargo: ", NEW.nombre_cargo)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_insert_permiso;
DELIMITER $$
CREATE TRIGGER after_insert_permiso
 AFTER INSERT ON permiso
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Permisos"),
    CONCAT("Cedula_trabajador: ", NEW.cedula_trabajador)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_update_permiso;
DELIMITER $$
CREATE TRIGGER after_update_permiso
 AFTER UPDATE ON permiso
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Permisos"),
    CONCAT("Cedula_trabajador: ", NEW.cedula_trabajador)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_insert_trabajosextras;
DELIMITER $$
CREATE TRIGGER after_insert_trabajosextras
 AFTER INSERT ON trabajosextras
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Trabajos_extras"),
    CONCAT("Cedula_trabajador: ", NEW.cedula_trabajador)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_update_trabajosextras;
DELIMITER $$
CREATE TRIGGER after_update_trabajosextras
 AFTER UPDATE ON trabajosextras
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Trabajos_extras"),
    CONCAT("Cedula_trabajador: ", NEW.cedula_trabajador)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_insert_nomina;
DELIMITER $$
CREATE TRIGGER after_insert_nomina
 AFTER INSERT ON nomina
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Nomina"),
    CONCAT("Id_nomina: ", NEW.id_nomina)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_update_nomina;
DELIMITER $$
CREATE TRIGGER after_update_nomina
 AFTER UPDATE ON nomina
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Nomina"),
    CONCAT("Id_nomina: ", NEW.id_nomina)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_update_deducciones;
DELIMITER $$
CREATE TRIGGER after_update_deducciones
 AFTER UPDATE ON deducciones
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Deducciones"),
    CONCAT("Id_deducciones: ", NEW.id_deducciones)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_insert_recibos_bonos;
DELIMITER $$
CREATE TRIGGER after_insert_recibos_bonos
 AFTER INSERT ON recibos_bonos
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Recibo_bonos"),
    CONCAT("Id_recibo_bono: ", NEW.id_recibo_bono)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_update_recibos_bonos;
DELIMITER $$
CREATE TRIGGER after_update_recibos_bonos
 AFTER UPDATE ON recibos_bonos
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Recibo_bonos"),
    CONCAT("Id_recibo_bono: ", NEW.id_recibo_bono)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_insert_bonos;
DELIMITER $$
CREATE TRIGGER after_insert_bonos
 AFTER INSERT ON bonos
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Bonos"),
    CONCAT("Nombre_bono: ", NEW.nombre_bono)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_update_bonos;
DELIMITER $$
CREATE TRIGGER after_update_bonos
 AFTER UPDATE ON bonos
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Bonos"),
    CONCAT("Nombre_bono: ", NEW.nombre_bono)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_insert_roles;
DELIMITER $$
CREATE TRIGGER after_insert_roles
 AFTER INSERT ON roles
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Registrar"),
    CONCAT("Roles"),
    CONCAT("Nombre_rol: ", NEW.nombre_rol)
);
END;
$$
DELIMITER ;

DROP TRIGGER IF EXISTS after_updatet_roles;
DELIMITER $$
CREATE TRIGGER after_updatet_roles
 AFTER UPDATE ON roles
 FOR EACH ROW
BEGIN
 insert into bitacora(fecha, accion, tabla, dato_referencia)
    values(
    now(),
    -- La funcion CONCAT, junta dos valores como una cadena de caracteres.
    -- construyendo el SQL que elimina el registro recien insertado
    CONCAT("Actualizar"),
    CONCAT("Roles"),
    CONCAT("Nombre_rol: ", OLD.nombre_rol)
);
END;
$$
DELIMITER ;