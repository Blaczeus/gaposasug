export function getFallbackImage(gender) {
  const isDarkMode = window.matchMedia &&
    window.matchMedia('(prefers-color-scheme: dark)').matches

  const basePath = '/dashboard-assets/img/figure/'

  if (gender?.toLowerCase() === 'female') {
    return !isDarkMode ? `${basePath}female_user_dark.png` : `${basePath}female_user_light.png`
  }

  return !isDarkMode ? `${basePath}user_dark.png` : `${basePath}user_light.png`
}
