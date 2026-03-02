import csv

estados_vistos = {}  # Para no duplicar estados

sql_estados    = []
sql_municipios = []

with open('src/negocio/ESTADOS_Y_MUNICIPIOS_INEGI_202512121054579_utf.csv', encoding='utf-8-sig') as f:
    reader = csv.DictReader(f)
    for row in reader:
        cve_ent  = int(row['CVE_ENT'])
        nom_ent  = row['NOM_ENT'].strip()
        nom_mun  = row['NOM_MUN'].strip()

        # Agrega el estado solo la primera vez que aparece
        if cve_ent not in estados_vistos:
            estados_vistos[cve_ent] = nom_ent
            sql_estados.append(
                f"INSERT INTO estado(id_estado, estado) VALUES ({cve_ent}, '{nom_ent}');"
            )

        # Municipio con FK al estado
        sql_municipios.append(
            f"INSERT INTO municipio(municipio, id_estado) VALUES ('{nom_mun}', {cve_ent});"
        )

# Escribe el archivo SQL
with open('municipios_mexico.sql', 'w', encoding='utf-8') as out:
    out.write("-- ESTADOS\n")
    out.write('\n'.join(sql_estados))
    out.write("\n\n-- MUNICIPIOS\n")
    out.write('\n'.join(sql_municipios))

print(f"Estados:    {len(sql_estados)}")
print(f"Municipios: {len(sql_municipios)}")