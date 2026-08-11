import gulp from "gulp";
import zip from "gulp-zip";

const themeSlug = "growmodo";

export function zipTheme() {
  return gulp
    .src(
      [
        "**/*",
        "!node_modules/**",
        "!src/**",
        "!.git/**",
        "!*.zip",
        "!gulpfile.js",
      ],
      { base: "." }
    )
    .pipe(zip(`${themeSlug}.zip`))
    .pipe(gulp.dest("."));
}

export default zipTheme;
export { zipTheme as zip };
