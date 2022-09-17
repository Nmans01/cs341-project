from perlin_noise import PerlinNoise

#
class HeightMap () :

    def Generate (mapWidth, mapHeight, scale):

        noiseMap = [[0 for x in range(mapWidth)] for y in range(mapHeight)]

        if scale <= 0:
            scale = min

        perlinMap = PerlinNoise(1)

        for y in mapHeight:
            for x in mapWidth:
                sampleX = x / scale
                sampleY = y / scale

                noiseMap[x][y] = perlinMap[sampleX][sampleY]

        return noiseMap