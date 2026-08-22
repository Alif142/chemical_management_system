INSERT INTO user
(
    user_id,
    role_id,
    name,
    email,
    password
)
VALUES
(
    'USR001',
    'ROL001',
    'Administrator',
    'admin@gmail.com',
    'admin123'
);


INSERT INTO chemical
(
    chemical_id,
    chemical_name,
    hazard,
    unit_price
)
VALUES
(
    'CHM001',
    'Acetone',
    'Flammable',
    1200.00
);

INSERT INTO chemical
(
    chemical_id,
    chemical_name,
    hazard,
    unit_price
)
VALUES
(
    'CHM002',
    'Methanol',
    'Toxic',
    950.00
);

INSERT INTO chemical
(
    chemical_id,
    chemical_name,
    hazard,
    unit_price
)
VALUES
(
    'CHM003',
    'Ethanol',
    'Flammable',
    1500.00
);
